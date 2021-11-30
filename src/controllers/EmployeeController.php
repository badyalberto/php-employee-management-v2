<?php

require_once CLASSES . "Controller.php";
require_once CLASSES . "View.php";
require_once MODELS . "EmployeeModel.php";

class EmployeeController extends Controller
{
	public function __construct()
	{
		$this->model = new EmployeeModel();
		$this->view = new View();

		if(!isset($_SESSION["username"])) {
			header("Location: " . BASE_URL . "/");
		}
	}

	// Data Processing

	protected function create($params)
	{
		$result = $this->model->create($params);

		if (isset($params["reload"])) {
			if (!$result["error"]) {
				header("Location: /employee");
			} else {
				throw new Exception("Employee could not be created.");
			}
		} else {
			if (!$result["error"]) {
				echo json_encode(["type" => "success", "message" => "Employee created successfully."]);
			} else {
				echo json_encode(["type" => "danger", "message" => "Employee could not be created."]);
			}
		}
	}

	protected function update($params)
	{
		$result = $this->model->update($params);

		if (isset($params["reload"])) {
			if (!$result["error"]) {
				header("Location: /employee");
			} else {
				throw new Exception($result["error"]);
			}
		} else {
			if (!$result["error"]) {
				echo json_encode(["type" => "success", "message" => "Employee updated successfully."]);
			} else {
				echo json_encode(["type" => "danger", "message" => "Employee could not be updated."]);
			}
		}
	}

	protected function delete($params)
	{
		$result = $this->model->delete($params);

		if (isset($params["reload"])) {
			if (!$result["error"]) {
				header("Location: /employee");
			} else {
				throw new Exception("Employee could not be deleted.");
			}
		} else {
			if (!$result["error"]) {
				echo json_encode(["type" => "success", "message" => "Employee deleted successfully."]);
			} else {
				echo json_encode(["type" => "danger", "message" => "Employee could not be deleted."]);
			}
		}
	}

	protected function getAll()
	{
		$result = $this->model->getAll();

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employees fetched successfully.", "data" => $result["data"]]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employees could not be loaded."]);
		}
	}

	// View Display

	protected function edit($params)
	{
		$result = $this->model->get($params);

		if ($result["error"]) throw new Exception("Employee could not be loaded.");
		if (!$result["data"]) throw new Exception("Employee not found.");

		$this->view->render("Employee/edit", $result["data"]);
	}

	protected function new()
	{
		$this->view->render("Employee/new");
	}

	protected function index()
	{
		$this->view->render("Employee/index");
	}
}
