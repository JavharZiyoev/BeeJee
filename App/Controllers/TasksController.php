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
		$sortField = "id";
		$order = 1;
		$tasksObject = new Tasks();
		// for pagination
		if(isset($_GET["page"]))
		  $page = htmlspecialchars($_GET["page"]);
	    // for sorting field
		if(isset($_GET["sortField"]))
		{
			$sortField = htmlspecialchars($_GET["sortField"]);
			// for sorting order
			
			if(isset($_GET["order"]))
				$order = htmlspecialchars($_GET["order"]);
		}
		$tasks = $tasksObject->getTasks($page, 3, $sortField, $order);
		$paginationNumbers = $tasksObject->getNumberOfRows() / 3;
		return View::Render('tasks', ['tasks' => $tasks, 'rowsAmount' => $paginationNumbers, "sortField" => $sortField, 'order' => $order, 'page' => $page]);
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