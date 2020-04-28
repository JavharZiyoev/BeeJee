<?php

namespace App\Controllers;

use App\View;
use App\Models\Task;
class TasksController
{
	private $backUrl;
	private $page = 1;
	
	public function __construct()
	{
		if(isset($_SERVER['HTTP_REFERER'])) $this->backUrl = $_SERVER['HTTP_REFERER'];
		if(isset($_GET['page'])) $this->page = htmlspecialchars($_GET['page']);
	}
	
	public function Index()
	{
	    // for sorting field
		$sortField = null;
		$order = @$_COOKIE['OrderType'];
		if(isset($_GET["sortField"]))
		{
			$sortField = htmlspecialchars($_GET["sortField"]);
			if($sortField == @$_COOKIE['SortField'])
			{
				$order = !@$_COOKIE['OrderType'];
				setcookie("OrderType", $order, time() + (86400 * 30), "/");
			}else 
				setcookie("OrderType", 1, time() + (86400 * 30), "/");
			setcookie("SortField", $sortField, time() + (86400 * 30), "/");
			// for sorting order
		}else $sortField = $_COOKIE['SortField'];
		$task = new Task();
		$taskList = $task->getTasks($this->page, 3, $sortField, $order);
		return View::Render('tasks', ['tasks' => $taskList, 'page' => $this->page, 'rowsAmount' =>$task->getNumberOfRows() / 3]);
	}
	
	public function AddTask()
	{
		if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["text"]))
		{
			$username = htmlspecialchars($_POST["username"]);
			$email = htmlspecialchars($_POST["email"]);
			$text = htmlspecialchars($_POST["text"]);
			$task = new Task();
			$result = $task->insertTask($username, $email, $text);
			$message = null;
			if($result != null) $message = "Задача&nbsp;успешно&nbsp;добавлена";
			setcookie("Message", $message, time() + (86400 * 30), "/");
			return Header("Location: $this->backUrl");
		}
	}
	
	public function EditTask()
	{
		if(isset($_POST["textEdit"]) && isset($_POST["status"]) && isset($_POST["editId"]))
		{
			$text = htmlspecialchars($_POST["textEdit"]);
			$status = htmlspecialchars($_POST["status"]);
			$id = htmlspecialchars($_POST["editId"]);
			$task = new Task();
			$result = $task->updateTask($id, $text, $status);
			$message = null;
			if($result != null) $message = "Задача&nbsp;успешно&nbsp;изменена";
			setcookie("Message", $message, time() + (86400 * 30), "/");
			return Header("Location: $this->backUrl");
		}
	}
	
}