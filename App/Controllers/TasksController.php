<?php

namespace App\Controllers;

use App\View;
use App\Models\Tasks;
class TasksController
{
	public function __construct()
	{
		$tasksObject = new Tasks();
	}
	public function Index()
	{
		$page = $_GET["page"];
		$amount = 3;
		$tasksObject = new Tasks();
		$tasks = $tasksObject->getTasks($page, 3);
		$paginationNumbers = $tasksObject->getNumberOfRows() / $amount;
		return View::Render('tasks', ['tasks' => $tasks, 'rowsAmount' => $paginationNumbers]);
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