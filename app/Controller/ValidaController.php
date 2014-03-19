<?php

App::uses('AppController', 'Controller');

class ValidaController extends AppController {

  public $uses = array('HashTable','Validacion');

  public function index() {
    header("Content-type: application/json");
  
    $nextImg = $this->HashTable->find(
      'first',
      array(
	'conditions' => array(
    'HashTable.hash IS NULL',
    'HashTable.completed = 0'
    ),
	'order' => 'RAND()'
      )
    );
    
    // Cleanup table & get another image
    if(empty($nextImg)) {
      $this->HashTable->query("UPDATE hash_table SET hash=NULL, valid_until=NULL");
      $nextImg = $this->HashTable->find(
	'first',
	array(
	  'conditions' => array(
      'HashTable.hash IS NULL',
      'HashTable.completed = 0'
     ),
	  'order' => 'RAND()'
	)
      );
    }
    // Generate token
    $expireDate = date("Y-m-d H:i:s",time()+60*5);
    $nextImg['HashTable']['valid_until'] = $expireDate;
    $nextImg['HashTable']['hash'] = sha1($nextImg['HashTable']['id'].$nextImg['HashTable']['partido'].$expireDate);
    
    // TO DO: Check for collisions
    
    $this->HashTable->id = $nextImg['HashTable']['id'];
    
    if($this->HashTable->save($nextImg)) {
      echo json_encode(array("token"=>$nextImg['HashTable']['hash']));
    } else {
      echo json_encode(array("Error"=>"Cannot generate token"));
    }
    exit();
  }
  
  public function image($hash) {
    $img = $this->HashTable->findByHash($hash);
    if(empty($img)) {
      throw new NotFoundException();
      return;
    }
    
    header("Content-type: image/jpg");
    echo file_get_contents("./files/actas/".sprintf("%05d",$img['HashTable']['acta_id'])."_".(($img['HashTable']['partido']=='f') ? 'fm' : 'ar').".png");
    // echo file_get_contents("./files/actasjpg/1va.jpg");
    exit();
  }
  
  public function conteo() {
    header("Content-Type: application/json");
    if(isset($_POST['token'])&&isset($_POST['value'])&&is_numeric($_POST['value'])) {
      $data = $this->HashTable->find(
	'first',
	array(
	  'conditions' => array(
	    'AND' => array(
	      'HashTable.hash' => $_POST['token'],
	      'HashTable.valid_until > NOW()'
	      )
	    )
	)
      );
      if(!empty($data)) {
	$votos = intval($_POST['value']);
	if($votos>=0 && $votos<=500) {
	  $validacion = array(
	    'Validacion' => array(
	      'acta_id' => $data['HashTable']['acta_id'],
	      'partido' => $data['HashTable']['partido'],
	      'digitado' => $_POST['value'],
	      'fecha' => date("Y-m-d H:i:s"),
	      'origin' => $_SERVER['REMOTE_ADDR']
	    )
	  );
	  if($this->Validacion->save($validacion)) {
	    // Clear 
	    $this->HashTable->query("UPDATE hash_table SET valid_until=NULL WHERE id=".$data['HashTable']['id']);
	    echo json_encode(array("Status"=>"OK"));
	  } else {
	  echo json_encode(array("Error"=>"Cannot save data."));
	  }
	} else {
	  echo json_encode(array("Error"=>"Invalid range for value."));
	}
      } else {
      echo json_encode(array("Error"=>"Invalid or expired token."));
      }
    } else {
      echo json_encode(array("Error"=>"Invalid token or value."));
    }
    exit();
  }

  public function resultJSON() {
    header("Content-Type: application/json");
    $result = $this->HashTable->query("
SELECT
  count(*) AS total_boletas,
  (sum(f)/(sum(f)+sum(a))) AS perc_fmln,
  (sum(a)/(sum(f)+sum(a))) AS perc_arena,
  sum(f) as votos_fmln,
  sum(a) as votos_arena
FROM
  results_final5
WHERE
  f IS NOT NULL AND a IS NOT NULL");
    echo json_encode(
      array(
        'boletas' => $result[0][0]['total_boletas'],
        'votos' => $result[0][0]['votos_fmln']+$result[0][0]['votos_arena'],
        'results' => array(
          array(
            'color' => 'red',
            'description' => 'Votos digitados para FMLN a través de Contemos Nosotros',
            'title' => 'FMLN',
            'value' => $result[0][0]['perc_fmln'],
            'votos' => $result[0][0]['votos_fmln']
          ),
          array(
            'color' => 'blue',
            'description' => 'Votos digitados para ARENA a través de Contemos Nosotros',
            'title' => 'ARENA',
            'value' => $result[0][0]['perc_arena'],
            'votos' => $result[0][0]['votos_arena']
          )
        )
      )
    );
    exit();
 }

  public function resultJSONAll() {
    header("Content-Type: application/json");
    $result = $this->HashTable->query("
SELECT
  count(*) AS total_boletas,
  (sum(f)/(sum(f)+sum(a))) AS perc_fmln,
  (sum(a)/(sum(f)+sum(a))) AS perc_arena,
  sum(f) as votos_fmln,
  sum(a) as votos_arena
FROM
  results_final5
WHERE
  f IS NOT NULL OR a IS NOT NULL");
    echo json_encode(
      array(
        'boletas' => $result[0][0]['total_boletas'],
        'votos' => $result[0][0]['votos_fmln']+$result[0][0]['votos_arena'],
        'results' => array(
          array(
            'color' => 'red',
            'description' => 'Votos digitados para FMLN a través de Contemos Nosotros',
            'title' => 'FMLN',
            'value' => $result[0][0]['perc_fmln'],
            'votos' => $result[0][0]['votos_fmln']
          ),
          array(
            'color' => 'blue',
            'description' => 'Votos digitados para ARENA a través de Contemos Nosotros',
            'title' => 'ARENA',
            'value' => $result[0][0]['perc_arena'],
            'votos' => $result[0][0]['votos_arena']
          )
        )
      )
    );
    exit();
 }

  public function sysStats() {
    header("Content-Type: application/json");

    $statIP = $this->HashTable->query("SELECT COUNT(*) as statIP FROM (SELECT DISTINCT origin FROM validaciones) as tbl1");
    $statDig = $this->HashTable->query("SELECT COUNT(*) as statDig FROM validaciones");

    echo json_encode(
      array(
        'statIP' => $statIP[0][0]['statIP'],
        'statDig' => $statDig[0][0]['statDig']
      )
    );

    exit();
  }
}

