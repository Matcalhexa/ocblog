<?php

require_once("model/connectManager.php");

class UserManager extends Manager {
	
	public function getUser($username)
	{
		$db = $this->dbConnect();

		$request  = $db->prepare('SELECT * FROM membres WHERE username = ?');
		$request->execute(array($username));

		$user = $request->fetch();

		return $user;
	}
	
	public function getUserByEmail($email)
	{
		$db = $this->dbConnect();

		$request  = $db->prepare('SELECT * FROM membres WHERE email = ?');
		$request->execute(array($email));

		$user = $request->fetch();

		return $user;
	}

	public function createUser($username, $hashedPassword, $email){
		$db = $this->dbConnect();

        $request = $db->prepare('INSERT INTO membres(username, password, email, role) VALUES (?, ?, ?, "User")');
        $createdUser = $request->execute(array($username, $hashedPassword, $email));

        return $createdUser;
	}
}