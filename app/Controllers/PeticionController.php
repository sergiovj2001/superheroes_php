<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/

namespace App\Controllers;
use App\Models\Peticion;

class PeticionController extends BaseController {
    public function getPeticiones(){
        return Peticion::getInstancia()->getAll();
    }
    public function crearPeticionAction($titulo,$descripcion){
        $peticion = new Peticion();
        echo $titulo;
        echo $descripcion;
        $peticion->set(["titulo"=>$titulo,"descripcion"=>$descripcion]);
        $this->renderHTML('..\views\ciudadano_view.php',"peticion realizada");
    }
}
?>