<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "EmployeeModel.php";

class EmployeeController extends Controller
{
	public function __construct()
	{
		$this->model = new EmployeeModel();
	}

	// Metodos que devuelven JSON

	protected function create($params)
	{
		$result = $this->model->create($params);

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employee created successfully."]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employees could not be created.", "error" => $result["error"]]);
		}
	}

	protected function update($params)
	{
		$result = $this->model->update($params);

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employee updated successfully."]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employees could not be updated.", "error" => $result["error"]]);
		}
	}

	protected function delete($params)
	{
		echo "Se ha ejecutado el método delete de employee";
	}

	protected function get($params)
	{
		echo "Se ha ejecutado el método get de employee";
	}

	protected function getAll($params)
	{
		$result = $this->model->getAll();

		if (!$result["error"]) {
			echo json_encode(["type" => "success", "message" => "Employees fetched successfully.", "data" => $result["data"]]);
		} else {
			echo json_encode(["type" => "danger", "message" => "Employees could not be found."]);
		}
	}

	// Métodos que devuelven la página

	protected function employee($params)
	{
		echo "Se ha ejecutado el método employee de employee";
	}

	protected function dashboard($params)
	{
		echo "Se ha ejecutado el método dashboard de employee";
	}
}
