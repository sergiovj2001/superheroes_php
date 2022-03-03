<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
require_once('../vendor/autoload.php');
require "../bootstrap.php";
use App\Controllers\UsuarioController;
use App\Core\Router;
$router = new Router();
session_start();
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $request);
if (isset($_POST["usuario"])&& isset($_POST["password"])) {
    $usuario = new UsuarioController();
    $usuario->loginAction($_POST["usuario"], $_POST["password"]);
}
?>