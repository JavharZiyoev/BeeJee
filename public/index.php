<?php

require_once('../routes.php');

$className = $routes[$_SERVER['REQUEST_URI']][0] . "Controller";
$action = $routes[$_SERVER['REQUEST_URI']][1];

// Create Controller instance
require_once("../Controllers/$className.php");
$obj = new $className();
echo $obj->$action();