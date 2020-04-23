<?php
namespace App;  

class Routes {
	private static $routes = [
		"/some/link" => ["Test", "Index"],
		"/test/a" => ["Test", "Test"]
	];
	
	public static function getRoutes()
	{
		return self::$routes;
	}
	
	public static function getControllerAndAction(string $route)
	{
		$routes = self::$routes;
		if(array_key_exists($route, $routes)) return $routes[$_SERVER['REQUEST_URI']];
		else return null;
	}
}