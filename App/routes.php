<?php
namespace App;  

class Routes {
	private static $routes = [
		"/" => ["Tasks", "Index"],
		"/tasks" => ["Tasks", "Index"],
		"/tasks/add" => ["Tasks", "AddTask"],
		"/login" => ["Login", "Login"]
	];
	
	public static function getRoutes()
	{
		return self::$routes;
	}
	
	public static function getControllerAndAction(string $route)
	{
		$_route = $route;
		// for query params
		if($pos = strpos($route, "?")) 
		{
			$_route = substr($route, 0, $pos);
		}
		$routes = self::$routes;
		if(array_key_exists($_route, $routes)) return $routes[$_route];
		else return null;
	}
}