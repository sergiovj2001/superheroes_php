<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
require_once('../vendor/autoload.php');
require "../bootstrap.php";
use App\Controllers\DefaultController;
use App\Controllers\SuperHeroesController;
use App\Core\Router;

$router = new Router();
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $request);
$controller = new DefaultController();
if (!isset($_SESSION["auth"])) {
    $router->add(array(
    'name'=>'home', 
    'path'=>'/ge/', 
    'action'=> 'indexAction'));
    $request=str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
    $request;
    $route =$router->match($request);
    if ($route) {
        echo "adios";
    } else if (isset($_GET["nombre"])) {
        $controller = new DefaultController();
        $controller->getSuperheroeAction($_GET["nombre"]);
    // } else if (isset($_POST["nombre"])){
    
    }else {
        $controller->indexAction();
    }
}
// $router->add(array(
//     'name'=>'home', 
//     'path'=>'/^/$/', 
//     'action'=>[SuperHeroeController::class, 'IndexAction']));
//     $request=str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
//     $route =$router->match($request);
    
    
//     if ($route) {
//         $controllerName = $route['action'][0];
//         $actionName = $route['action'][1];
//         $controller = new $controllerName;
//         $controller->$actionName($request);
//     } else {
//         echo "No route";
//     }
// if ($ruta[1] == 'saluda') {
//     $controller->saludaAction();
// } elseif ($ruta[1] == 'numeros') {
//     $controller->numerosAction();
// } else {
//     echo '<br>' . 'No se encuentra la ruta';
// }
?>