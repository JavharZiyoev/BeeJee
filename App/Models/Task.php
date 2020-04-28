<?php

namespace App\Models;
use App\SQLiteConnection;
class Task
{
	private $pdo;
	private $sortFields = ["id", "username", "email", "status"];
	public function __construct()
	{
		$this->pdo = (new SQLiteConnection)->connect();
	}
	
	public function getTasks($page=1, $amount=3, $sortField="id", $sortOrder=1)
	{
		$_sortOrder = "DESC";
		if($sortOrder == 0) $_sortOrder = "ASC";
		if(in_array($sortField, $this->sortFields)) $_sortField = $sortField;
	    else $sortField = "id";
		$pdo = $this->pdo;
		$s = ($page - 1) * $amount;
		$sql = "SELECT * FROM tasks ORDER BY $sortField $_sortOrder LIMIT $amount OFFSET $s;";
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
		echo $sql;
		$stmt = $pdo->prepare($sql);
		$result = $stmt->execute();
		return $result;
		return null;
		
	}
	public function updateTask($id, $text, $status)
	{
		$pdo = $this->pdo;
		$sql = "UPDATE tasks SET content=\"$text\", status=$status, status=$status, changed=1 WHERE id=$id;";
		echo $sql;
		$stmt = $pdo->prepare($sql);
		$result = $stmt->execute();
		return $result;
		return null;
		
	}
}
