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
echo "hola";
echo $_POST["usuario"];
echo $_POST["password"];


if (isset($_POST["usuario"])&& isset($_POST["password"])) {
    echo "hola";
    $usuario = new UsuarioController();
    $usuario->registerAction($_POST["usuario"], $_POST["password"], $_POST["rol"]);
}
?>