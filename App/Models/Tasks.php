<?php

namespace App\Models;
use App\SQLiteConnection;
class Tasks
{
	private $pdo;
	private $sortFields = ["id", "username", "email", "status"];
	public function __construct()
	{
		$this->pdo = (new SQLiteConnection)->connect();
	}
	
	public function getTasks(int $page=1, int $amount=3, $sortField="id", $sortOrder=1)
	{
		$_sortOrder = "DESC";
		if($sortOrder == 0) $_sortOrder = "ASC";
		if(in_array($sortField, $this->sortFields)) $_sortField = $sortField;
	    else $sortField = "id";
		$pdo = $this->pdo;
		$s = ($page - 1) * $amount;
		$sql = "SELECT username, email, content, status FROM tasks ORDER BY $sortField $_sortOrder LIMIT $amount OFFSET $s;";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		if($data = $stmt->fetchAll())
		{
			return $data;
		}
		return [];
		
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
	public function insertTask($username, $email, $text)
	{
		$pdo = $this->pdo;
		$sql = "INSERT INTO tasks(username, email, content) VALUES(\"$username\", \"$email\", \"$text\");";
		$stmt = $pdo->prepare($sql);
		$result = $stmt->execute();
		return $result;
		return null;
		
	}
	
}
