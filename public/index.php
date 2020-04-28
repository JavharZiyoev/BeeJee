<?php

require_once("../vendor/autoload.php");

use App\Routes;
use App\SQLiteConnection;

$data = Routes::getControllerAndAction($_SERVER['REQUEST_URI']);
// Not Found
if($data == null) 
{
	return Header("Location: /tasks");
	die;
}
$className = "App\\Controllers\\" . $data[0] . "Controller";
$action = $data[1];

// Database Connection
$pdo = (new SQLiteConnection())->connect();
if ($pdo == null)
    echo 'Whoops, could not connect to the SQLite database!';

// Create Controller instance
$obj = new $className();
return $obj->$action();
