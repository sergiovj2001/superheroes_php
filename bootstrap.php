<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
require "vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
define("DBHOST",$_ENV["DBHOST"]);
define("DBUSER",$_ENV["DBUSER"]);
define("DBPASS",$_ENV["DBPASS"]);
define("DBNAME",$_ENV["DBNAME"]);
define("DBPORT",$_ENV["DBPORT"]);
define("DIRBASEURL",$_ENV["DIRBASEURL"]);
?>