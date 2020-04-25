<?php

namespace App;

class View
{
	public static function Render(string $template, array $vars = [])
	{
		//$data = explode(".", $template);
		extract($vars);
		$data = str_replace(".","/", $template);
		
		$file = dirname(__DIR__) . "/App/Views/$data.php";

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
		
	}
}