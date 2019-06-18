<?php
class Manager
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=db5000094081.hosting-data.io;dbname=dbs88680;charset=utf8', 'dbu296893', 'BlOgJf30210*');
		return $db;
	}
}