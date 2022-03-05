<?php
namespace App\Controllers;

use App\Models\Superheroe;

class DefaultController extends BaseController {

    private function superpoder($id){
        return Superheroe::getInstancia()->getSuperpoder($id);
    }
    private function getSuperheroes(){
        return Superheroe::getInstancia()->getAll();
    }
    public function indexAction() {
        $data = [];
        $data["superheroes"] = $this->getSuperheroes();
        $data["habilidades"] = [];
        for ($i=0; $i <count($data["superheroes"]) ; $i++) {
            array_push($data['habilidades'] ,$this->superpoder($data["superheroes"][$i]["id"]));
        }
        $this->renderHTML('..\views\index_view.php', $data);
    }
}
?>