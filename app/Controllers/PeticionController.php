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
        $data = [];
        $peticion->set(["titulo"=>$titulo,"descripcion"=>$descripcion]);
        $data[0] = "Petición creada correctamente";
        $this->renderHTML('..\views\ciudadano_view.php', $data);
    }
}
?>