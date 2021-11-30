<?php

require_once CLASSES . "Model.php";
require_once LIBS . "Database.php";

class UserModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get($params)
	{
		try {
/* 		 	print_r($params);
			die();  */
			$connection = $this->database->getDatabaseConnection();

			$query = "
				SELECT user_id,username,password
				FROM user 
				WHERE username = :username
			;";
			$statment = $connection->prepare($query);
			$statment->bindParam(":username", $params["username"]);
			$statment->execute();

			$data = $statment->fetch();

			return [
				"data" => $data,
				"error" => null
			];

		} catch (Exception $e) {
			return [
				"data" => $data,
				"error" => $e->getMessage(),
			];
		}
	}
}
