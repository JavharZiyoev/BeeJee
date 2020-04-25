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
	
	public function checkUser(int $page=1, int $amount=3)
	{
		$pdo = $this->pdo;
		$s = ($page - 1) * $amount;
		$sql = "SELECT * from ";
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
