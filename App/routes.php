<?php
namespace App;  

class Routes {
	private static $routes = [
		"/" => ["Tasks", "Index"],
		"/tasks" => ["Tasks", "Index", 0],
		"/tasks/add" => ["Tasks", "AddTask", 1],
		"/login" => ["Login", "Login"],
		"/logout" => ["Login", "Logout"],
		"/auth" => ["Login", "Auth"]
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
		if(array_key_exists($_route, $routes)) 
		{
			// check for auth(smth like auth middleware)
			
			if(@($routes[$_route])[2])
			{
				session_start();
				if(!isset($_SESSION["user"]))
					return Header("Location: /login");
			}
			
			return $routes[$_route];
		}
		else return null;
	}
}