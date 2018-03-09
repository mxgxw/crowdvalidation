<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class ApiController extends AppController {

    public function format_array($obj) {
      $out_data = [];
      foreach($obj as $key=>$data) {
        $out_data[] = $data;
      }
      return $out_data;
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
