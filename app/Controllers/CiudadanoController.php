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
    private function habilidades(){
        return Superheroe::getInstancia()->getHabilidades();
    }
    public function indexAction() {
        $data = [];
        $data = $this->getSuperheroes();
        array_push($data, ($this->habilidades()));
        $this->renderHTML('..\views\ciudadano_view.php', $data);
    }
}


?>