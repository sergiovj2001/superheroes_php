<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/

namespace App\Controllers;

use App\Models\Usuario;
class UsuarioController extends BaseController {
    public function loginAction($nombre, $password) {
        $usuario = new Usuario();
        $data = $usuario->getByNombre($nombre);
        if ($data[0]["password"] == $password) {
            $_SESSION["auth"] = "true";
            $_SESSION["id"] = $data[0]["id"];
            if ($data[0]["rol"] == "superheroe") {
                header('Location: superheroe.php');
            } else {
                header('Location: ciudadano.php');
            }
        } else {
            $this->renderHTML('..\views\index_view.php', $data);
        }
    }
    
    public function logoutAction() {
        header('Location:'.DIRBASEURL.'/');
    }
    public function registerAction($nombre, $password, $rol) {
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setPassword($password);
        $usuario->setRol($rol);
        $usuario->setEntity();
        
        header('Location: ciudadano.php');
    }
}