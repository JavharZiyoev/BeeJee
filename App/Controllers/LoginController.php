<?php

namespace App\Controllers;

use App\View;
use App\Models\User;
class LoginController
{
	public function __construct()
	{
	}
	
	
	public function Login()
	{
		session_start();
		// return to tasks page, if authenticated
		if(isset($_SESSION['user'])) return header("Location: /tasks");
		return View::Render('login');
	}
	
	public function Auth()
	{
		$user = new User();
		session_start();
		if( isset($_POST['username']) && isset($_POST['password']) )
		{
			if( $user->checkUser($_POST['username'], $_POST['password']))
			{
				// auth okay, setup session
				$_SESSION['user'] = $_POST['username'];
				// redirect to required page
				header( "Location: /tasks" );
			} else {
				// didn't auth go back to loginform
				setcookie("Message", "Неправильные&nbsp;реквезиты&nbsp;доступа", time() + (86400 * 30), "/");
				header( "Location: /login" );
			}
		} else {
			// username and password not given so go back to login
			header( "Location: /login" );
		}
	}
	
		
	public function LogOut()
	{
		session_start();
		session_destroy();
		return header( "Location: /tasks" );
	}
	
	
}