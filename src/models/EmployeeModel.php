<?php

require_once CLASSES . "Model.php";
require_once LIBS . "Database.php";

class EmployeeModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($params)
	{
		try {
			$connection = $this->database->getDatabaseConnection();
			$connection->beginTransaction();

			// Adding employee in DB

			$query = "
				INSERT INTO employee (first_name, last_name, age, gender, email, phone_number)
				VALUES (:first_name, :last_name, :age, :gender, :email, :phone_number)
			";

			$statment = $connection->prepare($query);

			$statment->bindParam(":first_name", $params["first_name"]);
			$statment->bindParam(":last_name", 	$params["last_name"]);
			$statment->bindParam(":age", 				$params["age"]);
			$statment->bindParam(":gender", 		$params["gender"]);
			$statment->bindParam(":email", 			$params["email"]);
			$statment->bindParam(":phone_number", $params["phone_number"]);

			$statment->execute();
			$employee_id = $connection->lastInsertId();

			// Adding employee's address in DB

			$query = "
				INSERT INTO address (employee_id, street, city, postal_code, state)
				VALUES (:employee_id, :street, :city, :postal_code, :state)
			";

			$statment = $connection->prepare($query);

			$statment->bindParam(":employee_id", 	$employee_id);
			$statment->bindParam(":street", 			$params["street"]);
			$statment->bindParam(":city", 				$params["city"]);
			$statment->bindParam(":postal_code", 	$params["postal_code"]);
			$statment->bindParam(":state", 				$params["state"]);

			$statment->execute();
			$connection->commit();

			return [
				"error" => null
			];
		} catch (Exception $e) {
			$connection->rollBack();

			return [
				"error" => $e->getMessage()
			];
		}
	}

	public function update($params)
	{
		try {
			$connection = $this->database->getDatabaseConnection();
			$connection->beginTransaction();

			// Updating employee in DB
			$query = "
				UPDATE employee SET 
					first_name = :first_name,
					last_name = :last_name,
					age = :age,
					gender = :gender,
					email = :email,
					phone_number = :phone_number
				WHERE employee_id = :employee_id;
			;";

			$statment = $connection->prepare($query);

			$statment->bindParam(":employee_id", $params["employee_id"]);
			$statment->bindParam(":first_name", $params["first_name"]);
			$statment->bindParam(":last_name", 	$params["last_name"]);
			$statment->bindParam(":age", 				$params["age"]);
			$statment->bindParam(":gender", 		$params["gender"]);
			$statment->bindParam(":email", 			$params["email"]);
			$statment->bindParam(":phone_number", $params["phone_number"]);

			$statment->execute();
			$employee_id = $connection->lastInsertId();

			// Get employee DB ID

			$query = "SELECT id FROM employee WHERE employee_id = :employee_id;";

			$statment = $connection->prepare($query);

			$statment->bindParam(":employee_id", $params["employee_id"]);
			$statment->execute();
			$employee_id = $statment->fetch()["id"];


			// Update employee's address in DB

			$query = "
				UPDATE address SET 
					street = :street,
					city = :city,
					postal_code = :postal_code,
					state = :state
				WHERE employee_id = :employee_id
			;";

			$statment = $connection->prepare($query);

			$statment->bindParam(":employee_id", 	$employee_id);
			$statment->bindParam(":street", 			$params["street"]);
			$statment->bindParam(":city", 				$params["city"]);
			$statment->bindParam(":postal_code", 	$params["postal_code"]);
			$statment->bindParam(":state", 				$params["state"]);

			$statment->execute();

			$connection->commit();

			return ["error" => null];
		} catch (Exception $e) {
			return ["error" => $e->getMessage()];
		}
	}

	public function delete()
	{
		try {
		} catch (Exception $e) {
		}
	}

	public function get()
	{
		try {
		} catch (Exception $e) {
		}
	}

	public function getAll()
	{
		try {
			$connection = $this->database->getDatabaseConnection();

			$query = "
				SELECT e.employee_id, first_name, last_name, age, gender, email, phone_number, hire_date, street, city, postal_code, state
				FROM employee e
				LEFT JOIN address a ON e.id = a.employee_id;
			";

			$statment = $connection->prepare($query);
			$statment->execute();
			$data = $statment->fetchAll();

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
