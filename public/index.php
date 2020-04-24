<?php

require_once("../vendor/autoload.php");

use App\Routes;
use App\SQLiteConnection;

$data = Routes::getControllerAndAction($_SERVER['REQUEST_URI']);
// Not Found
if($data == null) 
{
	echo "404";
	die;
}
$className = "App\\Controllers\\" . $data[0] . "Controller";
$action = $data[1];


$pdo = (new SQLiteConnection())->connect();
if ($pdo != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';
// Create Controller instance
$obj = new $className();
return $obj->$action();
