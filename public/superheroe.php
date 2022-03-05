<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
require_once('../vendor/autoload.php');
require "../bootstrap.php";
use App\Controllers\SuperHeroesController;
use App\Core\Router;
use App\Controllers\PeticionController;

session_start();$router = new Router();
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $request);
if (isset($_SESSION["auth"])) {
    $router->add(array(
    'name'=>'tareaRealizada', 
    'path'=>'/\d/', 
    'action'=> 'completarAction'));
    $request=str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
    $route =$router->match($request);
    if ($route) {
        echo "adios";
    } else if (isset($_POST["titulo"])) {
        $peticion = new PeticionController();
        $peticion->crearPeticionAction($_POST["titulo"], $_POST["descripcion"]);
    } else if (isset($_GET["nombre"])) {
        $ciudadano = new CiudadanoController();
        $ciudadano->getSuperheroeAction($_GET["nombre"]);
    }
    else {
        $superheroe = new SuperHeroesController();
        $superheroe->indexAction();
    }
}else {
    header("Location: index.php"  );
}
?>