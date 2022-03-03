<?php
namespace App\Controllers;

use App\Models\Superheroe;

class DefaultController extends BaseController {

    private function getSuperheroes(){
        return Superheroe::getInstancia()->getAll();
    }
    public function indexAction() {
        $data = [];
        $data = $this->getSuperheroes();
        $this->renderHTML('..\views\index_view.php', $data);
    }
}
?>