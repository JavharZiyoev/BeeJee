<?php

namespace App\Controllers;

use App\View;
use App\Models\Tasks;
class TasksController
{
	public function __construct()
	{
	}
	public function Index()
	{
		$page = 1;
		if(isset($_GET["page"]))
		  $page = htmlspecialchars($_GET["page"]);
		$amount = 3;
		$tasksObject = new Tasks();
		$tasks = $tasksObject->getTasks($page, 3);
		if($tasks == null) $tasks = [];
		$paginationNumbers = $tasksObject->getNumberOfRows() / $amount;
		return View::Render('tasks', ['tasks' => $tasks, 'rowsAmount' => $paginationNumbers]);
	}
	
	public function AddTask()
	{
		$tasksObject = new Tasks();
		if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["text"]))
		{
			$username = htmlspecialchars($_POST["username"]);
			$email = htmlspecialchars($_POST["email"]);
			$text = htmlspecialchars($_POST["text"]);
			$result = $tasksObject->insertTask($username, $email, $text);
			if($result != null) return header('Location: /tasks');
		}
	}
	
}