<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/

namespace App\Controllers;
use App\Models\Superheroe;

class CiudadanoController extends BaseController {
    private function getSuperheroes(){
        return Superheroe::getInstancia()->getAll();
    }

    private function superpoder($id){
        return Superheroe::getInstancia()->getSuperpoder($id);
    }
    public function indexAction() {
        $data = [];
        $data["superheroes"] = $this->getSuperheroes();
        $data["habilidades"] = [];
        for ($i=0; $i <count($data["superheroes"]) ; $i++) {
            array_push($data['habilidades'] ,$this->superpoder($data["superheroes"][$i]["id"]));
        }
        $this->renderHTML('..\views\ciudadano_view.php', $data);
    }
    public function getSuperheroeAction($nombre) {
        $superheroe = new Superheroe();
        $data["superheroes"] = $superheroe->getByNombre($nombre);
        $data["habilidades"] = $this->superpoder($data["superheroes"][0]["id"]);
        $this->renderHTML('..\views\busqueda_view.php', $data);
    }
}


?>