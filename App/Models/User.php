<?php

namespace App\Models;
use App\SQLiteConnection;
class User
{
	private $pdo;
	public function __construct()
	{
		$this->pdo = (new SQLiteConnection)->connect();
	}
	
	public function checkUser(string $username, string $password)
	{
		$pdo = $this->pdo;
		$sql = "SELECT id from users WHERE username=\"$username\" and password=\"$password\"";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		if($data = $stmt->fetchColumn())
		{
			return $data;
		}
		return null;
		
	}
	
	public function updateToken($token, $id)
	{
		$pdo = $this->pdo;
		$sql = "UPDATE users SET token = $token WHERE id=$id;";
		$stmt = $pdo->prepare($sql);
		$result = $stmt->execute();
		return $result;
	}

}
