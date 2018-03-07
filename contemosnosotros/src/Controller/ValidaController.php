<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class ValidaController extends AppController {

    // Generates a token for each request
    public function index() {
        header("Content-type: application/json");
	$hashtable = TableRegistry::get('HashTable');
        $query = $hashtable->find('all')
            ->where([
            'hashvalue IS' => null,
            'completed' => 0
            ])
            ->order('RAND()');
        $nextImg = $query->first();

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
                ->order('RAND()');
            $nextImg = $query->first();
        }

        // Token Generation        
        $expireDate = date("Y-m-d H:i:s",time()+60*5);
        $nextImg->valid_until = $expireDate;
        $nextImg->hashvalue = sha1($nextImg->id.$expireDate.$nextImg->diputado);

        // Token delivery
        if($hashtable->save($nextImg)) {
            echo json_encode(array("token"=>$nextImg->hashvalue));
        } else {
            echo json_encode(array("Error"=>"Cannot generate token"));
        }
        exit(); // TODO: Remove
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
        header('Content-type: image/jpg');
        echo file_get_contents("./jrv/actas/".sprintf("%06d",$img->acta)."-".$img->diputado.".jpg");
        exit(); // TODO: Remove. 
    }

    // Cleanup
}
