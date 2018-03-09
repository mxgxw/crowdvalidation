<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class ApiController extends AppController {

    // Generates a token for each request
    public function index() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('DetalleDiputados');
        $query = $hashtable->find('all');
        $results = $query->all();

        echo json_encode($results->toArray());

        exit(); // TODO: Remove
    }

    // Generates a token for each request
    public function votopreferente() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('VotoPreferencial');
        $query = $hashtable->find('all');
        $results = $query->all();

        echo json_encode($results->toArray());

        exit(); // TODO: Remove
    }

    // Generates a token for each request
    public function votopreferenteactas() {
        header("Content-type: application/json");
        $hashtable = TableRegistry::get('VotoPreferencialCerteza');
        $query = $hashtable->find('all');
        $results = $query->all();

        echo json_encode($results->toArray());

        exit(); // TODO: Remove
    }
}