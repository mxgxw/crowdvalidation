<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class ApiController extends AppController {

    public function format_array($obj) {
      return array(
        $obj->diputado_id,
        $obj->dpto_id,
        $obj->dpto_nombre,
        $obj->partido_id,
        $obj->partido_nombre,
        $obj->diputado_nombre,
        $obj->marcas,
        $obj->disponibles,
        $obj->procesadas
      );
    }

    // Image selector
    public function image($hash) {
        if($hash===null) {
            throw new NotFoundException();
            return;
        }
 
        $hashtable = TableRegistry::get('HashTable');

        $query = $hashtable->find('all')
            ->where(['hashvalue'=>$hash]);

        $img = $query->first();

        if($img===null) {
            throw new NotFoundException();
            return;
        }
        header('Content-type: image/png');
        echo file_get_contents("./jrv/actas/".sprintf("%05d",$img->acta)."-".$img->diputado.".png");
        exit(); // TODO: Remove. 
    }

    /*
     * Generacion de Token para digitacion.
     * Esta funcion se encarga de generar el token
     * para la imagen a validar, como tambien de
     * guardar el resultado cuando recibe parametros
     * via POST.
     * Originalmente estas eran dos vistas separadas
     * pero en la API se decidio combinarlas para
     * realizar un solo request.
     */
    public function token() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('HashTable');
        $response = array(
            'token' => null,
            'result' => 'first',
            'errors' => array()
        );
        $errors = false;
        $errormsg = '';

        // Nota: Con este mecanismo siempre se genera un nuevo token
        $query = $hashtable->find('all')
            ->where([
            'hashvalue IS' => null,
            'completed' => 0
            ])
            ->order(['random' => 'ASC']);
        $nextImg = $query->first();

        // Buscar optimizar esta funcion
        if($nextImg === null) {
            // Reset whole table
            $query = $hashtable->query();
            $query->update()
                ->set([
                'hashvalue'=>null,
                'valid_until'=>null
                ])
                ->where(['1'=>1])
                ->execute();;
            // Get a new image
            $query = $hashtable->find('all')
                ->where([
                    'hashvalue IS' => null,
                    'completed' => 0
                ])
            ->order(['random' => 'ASC']);
            $nextImg = $query->first();
        }

        // Token Generation        
        $expireDate = date("Y-m-d H:i:s",time()+60*5);
        $nextImg->valid_until = $expireDate;
        $nextImg->hashvalue = sha1($nextImg->id.$expireDate.$nextImg->diputado);

        // Token delivery
        if($hashtable->save($nextImg)) {
            $response["token"] = $nextImg->hashvalue;
        } else {
            $response['errors'][] = 'No se puede generar un nuevo token';
        }

        // Almacenamiento de la digitacion si hay datos validos
        if(isset($_POST['token'])&&
           isset($_POST['value'])&&
           is_numeric($_POST['value'])) {
            $hashtable = TableRegistry::get('HashTable');
            $query = $hashtable->find('all')
                ->where([
                    'AND'=>array(
                        'hashvalue' => $_POST['token'],
                        'valid_until > NOW()'
                    )
                ]);
            $data = $query->first();

            if($data!==null) {
                $digitaciones = TableRegistry::get('Digitaciones');
                $digitacion = $digitaciones->newEntity();
                $votos = floatval($_POST['value']);

                if($votos>=0 && $votos<=500) {
                    $digitacion->acta_id = $data->acta;
                    $digitacion->diputado = $data->diputado;
                    $digitacion->fecha = date("Y-m-d H:i:s");
                    $digitacion->digitado = $votos;
                    $digitacion->origin = sha1(env('Security.salt').$_SERVER['REMOTE_ADDR']);

	            if($digitaciones->save($digitacion)) {
                        //$data->hashvalue = null;
                        //$data->valid_until = null;
                        //$hashtable->save($data);
                    $response['result'] = 'saved';
	            } else {
                    $response['errors'][] = 'DIG: No se puede generar un nuevo token';
	            }
	        } else {
                $response['errors'][] = 'DIG: Rango inválido de votos';
	        }
            } else {
                $response['errors'][] = 'DIG: Imagen expiró';
            }
        }

        echo json_encode($response);
        exit(); // TODO: Remove
    }

    public function test() {
        header("Content-type: application/json");
        $response = array('message'=>'God\'s in His heaven, all\'s right with the world.');
        echo json_encode($response);
        exit();
    }

    // Generates a token for each request
    public function index() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('DetalleDiputados');
        $query = $hashtable->find('all');
        $results = $query->all();

        echo json_encode(array("data"=>$results->toArray()));

        exit(); // TODO: Remove
    }

    // Generates a token for each request
    public function votopreferente() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('VotoPreferencial');
        $query = $hashtable->find('all');
        $results = $query->all();

        echo json_encode(array("data"=>$results));

        exit(); // TODO: Remove
    }

    // Generates a token for each request
    public function votopreferenteactas() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('VotoPreferencialCerteza');
        $query = $hashtable->find('all');
        $results = $query->all();
        $results_array = $results->toArray();

        echo json_encode(array("data"=>array_map(array($this,'format_array'),$results_array)));

        exit(); // TODO: Remove
    }
}
