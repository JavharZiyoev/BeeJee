<?php

namespace App\Controllers;

use App\View;
class TestController
{
	public function Index()
	{
		return View::Render('tasks');
	}
	
	public function Tasks()
	{
		return View::Render('login');
	}
	
	public function CC()
	{
		return "ll";
	}
}