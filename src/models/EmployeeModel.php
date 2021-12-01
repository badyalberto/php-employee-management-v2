<?php

require_once CLASSES . "Model.php";
require_once LIBS . "Database.php";

class EmployeeModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create(array $params)
	{
		try {
			$connection = $this->database->getDatabaseConnection();
			$connection->beginTransaction();

			// Adding employee in DB

			$query = "
				INSERT INTO employee (first_name, last_name, age, gender, email, phone_number)
				VALUES (:first_name, :last_name, :age, :gender, :email, :phone_number)
			";

			$statement = $connection->prepare($query);

			$statement->bindParam(":first_name", 		$params["first_name"]);
			$statement->bindParam(":last_name", 		$params["last_name"]);
			$statement->bindParam(":age", 					$params["age"]);
			$statement->bindParam(":gender", 				$params["gender"]);
			$statement->bindParam(":email", 				$params["email"]);
			$statement->bindParam(":phone_number", 	$params["phone_number"]);

			$statement->execute();
			$employee_id = $connection->lastInsertId();

			// Adding employee's address in DB

			$query = "
				INSERT INTO address (employee_id, street, city, postal_code, state)
				VALUES (:employee_id, :street, :city, :postal_code, :state)
			";

			$statement = $connection->prepare($query);

			$statement->bindParam(":employee_id", 	$employee_id);
			$statement->bindParam(":street", 				$params["street"]);
			$statement->bindParam(":city", 					$params["city"]);
			$statement->bindParam(":postal_code", 	$params["postal_code"]);
			$statement->bindParam(":state", 				$params["state"]);

			$statement->execute();
			$connection->commit();

			$uuid = $this->getUUIDByID($employee_id);

			return [
				"data" => ["employee_id" => $uuid, "id" => $employee_id],
				"error" => null
			];
		} catch (Exception $e) {
			$connection->rollBack();

			return [
				"data" => null,
				"error" => $e->getMessage()
			];
		}
	}

	public function update(array $params)
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
					phone_number = :phone_number,
					updated_at = CURRENT_TIMESTAMP()
				WHERE employee_id = :employee_id;
			;";

			$statement = $connection->prepare($query);

			$statement->bindParam(":employee_id", 	$params["employee_id"]);
			$statement->bindParam(":first_name", 		$params["first_name"]);
			$statement->bindParam(":last_name", 		$params["last_name"]);
			$statement->bindParam(":age", 					$params["age"]);
			$statement->bindParam(":gender", 				$params["gender"]);
			$statement->bindParam(":email", 				$params["email"]);
			$statement->bindParam(":phone_number", 	$params["phone_number"]);

			$statement->execute();

			if (!$statement->rowCount()) throw new Exception("Employee does not exist");

			// Get employee ID from UUID

			$employee_id = $this->getIDByUUID($params["employee_id"]);

			// Update employee's address in DB

			$query = "
				UPDATE address SET 
					street = :street,
					city = :city,
					postal_code = :postal_code,
					state = :state,
					updated_at = CURRENT_TIMESTAMP()
				WHERE employee_id = :employee_id
			;";

			$statement = $connection->prepare($query);
			$statement->bindParam(":employee_id", 	$employee_id);
			$statement->bindParam(":street", 				$params["street"]);
			$statement->bindParam(":city", 					$params["city"]);
			$statement->bindParam(":postal_code", 	$params["postal_code"]);
			$statement->bindParam(":state", 				$params["state"]);
			$statement->execute();

			$connection->commit();

			return ["error" => null];
		} catch (Exception $e) {
			return ["error" => $e->getMessage()];
		}
	}

	public function delete(array $params)
	{
		try {
			$connection = $this->database->getDatabaseConnection();
			$connection->beginTransaction();

			// Updating employee in DB

			$query = "
				UPDATE employee SET 
					deleted_at = CURRENT_TIMESTAMP()
				WHERE employee_id = :employee_id;
			;";

			$statement = $connection->prepare($query);
			$statement->bindParam(":employee_id", $params["employee_id"]);
			$statement->execute();

			if (!$statement->rowCount()) throw new Exception("Employee did not already exist");

			// Get employee ID from UUID

			$employee_id = $this->getIDByUUID($params["employee_id"]);

			// Update employee's address in DB

			$query = "
				UPDATE address SET 
					deleted_at = CURRENT_TIMESTAMP()
				WHERE employee_id = :employee_id
			;";

			$statement = $connection->prepare($query);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();

			$connection->commit();

			return ["error" => null];
		} catch (Exception $e) {
			return ["error" => $e->getMessage()];
		}
	}

	public function get(array $params)
	{
		try {
			$connection = $this->database->getDatabaseConnection();

			$query = "
				SELECT e.employee_id, first_name, last_name, age, gender, email, phone_number, hire_date, street, city, postal_code, state
				FROM employee e
				LEFT JOIN address a ON e.id = a.employee_id
				WHERE e.employee_id = :employee_id
			;";

			$statement = $connection->prepare($query);
			$statement->bindParam(":employee_id", $params["id"]);
			$statement->execute();
			$data = $statement->fetch();

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

	public function getAll()
	{
		try {
			$connection = $this->database->getDatabaseConnection();

			$query = "
				SELECT e.employee_id, first_name, last_name, age, gender, email, phone_number, hire_date, street, city, postal_code, state
				FROM employee e
				LEFT JOIN address a ON e.id = a.employee_id
				WHERE e.deleted_at IS NULL
			;";

			$statement = $connection->prepare($query);
			$statement->execute();
			$data = $statement->fetchAll();

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

	private function getIDByUUID($uuid)
	{
		$connection = $this->database->getDatabaseConnection();

		$query = "SELECT id FROM employee WHERE employee_id = :employee_id;";

		$statement = $connection->prepare($query);
		$statement->bindParam(":employee_id", $uuid);
		$statement->execute();

		return $statement->rowCount() ? $statement->fetch()["id"] : null;
	}

	private function getUUIDByID($id)
	{
		$connection = $this->database->getDatabaseConnection();

		$query = "SELECT employee_id FROM employee WHERE id = :id;";

		$statement = $connection->prepare($query);
		$statement->bindParam(":id", $id);
		$statement->execute();

		return $statement->rowCount() ? $statement->fetch()["employee_id"] : null;
	}
}
