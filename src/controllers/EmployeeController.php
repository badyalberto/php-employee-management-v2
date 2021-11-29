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
	}

	// Metodos que devuelven JSON

	protected function create($params)
	{
		$result = $this->model->create($params);

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employee created successfully.", "data" => null]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employee could not be created.", "error" => $result["error"]]);
		}
	}

	protected function update($params)
	{
		$result = $this->model->update($params);

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employee updated successfully."]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employee could not be updated.", "error" => $result["error"]]);
		}
	}

	protected function delete($params)
	{
		$result = $this->model->delete($params);

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employee deleted successfully."]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employee could not be deleted.", "error" => $result["error"]]);
		}
	}

	protected function getAll()
	{
		$result = $this->model->getAll();

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employees fetched successfully.", "data" => $result["data"]]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employees could not be found."]);
		}
	}

	// Métodos que devuelven la página

	protected function new()
	{
		$result = [];

		$this->view->render("Employee/new", $result);
	}

	protected function index()
	{
		$result = [];

		$this->view->render("Employee/index", $result);
	}
}
