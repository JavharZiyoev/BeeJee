<?php

require_once("../vendor/autoload.php");
use App\Routes;

$data = Routes::getControllerAndAction($_SERVER['REQUEST_URI']);
// Not Found
if($data == null) 
{
	echo "404";
	die;
}
$className = "App\\Controllers\\" . $data[0] . "Controller";
$action = $data[1];

// Create Controller instance
$obj = new $className();
return $obj->$action();
