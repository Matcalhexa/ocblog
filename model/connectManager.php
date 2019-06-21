<?php
class Manager
{
	protected function dbConnect()
	{
		$config = parse_ini_file('env.ini' , true);
		$user = $config['db_username'];
		$pass = $config['db_password'];

		$db = new PDO('mysql:host=db5000094081.hosting-data.io;dbname=dbs88680;charset=utf8', $user, $pass);
		return $db;
	}
}