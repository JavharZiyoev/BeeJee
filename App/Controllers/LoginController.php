<?php

namespace App\Controllers;

use App\View;
use App\Models\Tasks;
class LoginController
{
	public function __construct()
	{
	}
	
	
	public function Login()
	{
		return View::Render('login');
	}
	
	public function Auth()
	{
		
	}
	
}