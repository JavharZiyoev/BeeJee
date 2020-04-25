<?php

namespace App\Models;
use App\SQLiteConnection;
class Tasks
{
	private $pdo;
	public function __construct()
	{
		$this->pdo = (new SQLiteConnection)->connect();
	}
	
	public function getTasks(int $page=1, int $amount=3)
	{
		$pdo = $this->pdo;
		$s = ($page - 1) * $amount;
		$sql = "SELECT * FROM tasks LIMIT $amount OFFSET $s;";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		if($data = $stmt->fetchAll())
		{
			return $data;
		}
		return null;
		
	}
	
	public function getNumberOfRows()
	{
		$pdo = $this->pdo;
		$sql = 'SELECT COUNT(*) FROM tasks;';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		
		if($data = $stmt->fetchColumn())
		{
			return $data;
		}
		return null;
	}
	public function insertTask()
	{
		
	}
	
}
