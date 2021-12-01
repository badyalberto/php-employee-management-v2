<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "EmployeeModel.php";

class EmployeeController extends Controller
{
	private EmployeeModel $model;

	public function __construct()
	{
		parent::__construct();
		$this->model = new EmployeeModel();

		if (!SessionHelper::getSessionValue('username')) {
			header("Location: " . BASE_URL);
			exit();
		}
	}

	// Data Management

	protected function create()
	{
		$result = $this->model->create($this->params);

		if (isset($this->params["reload"])) {
			if (!$result["error"]) {
				SessionHelper::setSessionValue("message", ["type" => "success", "content" => "Employee created successfully."]);
			} else {
				SessionHelper::setSessionValue("message", ["type" => "danger", "content" => "Employee could not be created."]);
			}

			header("Location: " . BASE_URL . "employee");
			exit();
		} else {
			if (!$result["error"]) {
				echo json_encode(["message" => ["type" => "success", "content" => "Employee created successfully."], "data" => $result["data"]]);
			} else {
				echo json_encode(["message" => ["type" => "danger", "content" => $result["error"]]]);
			}
		}
	}

	protected function update()
	{
		$result = $this->model->update($this->params);

		if (isset($this->params["reload"])) {
			if (!$result["error"]) {
				SessionHelper::setSessionValue("message", ["type" => "success", "content" => "Employee updated successfully."]);
			} else {
				SessionHelper::setSessionValue("message", ["type" => "danger", "content" => "Employee could not be updated."]);
			}

			header("Location: " . BASE_URL . "employee");
			exit();
		} else {
			if (!$result["error"]) {
				echo json_encode(["message" => ["type" => "success", "content" => "Employee updated successfully."]]);
			} else {
				echo json_encode(["message" => ["type" => "danger", "content" => "Employee could not be updated."]]);
			}
		}
	}

	protected function delete()
	{
		$result = $this->model->delete($this->params);

		if (isset($this->params["reload"])) {
			if (!$result["error"]) {
				SessionHelper::setSessionValue("message", ["type" => "success", "content" => "Employee deleted successfully."]);
			} else {
				SessionHelper::setSessionValue("message", ["type" => "danger", "content" => "Employee could not be deleted."]);
			}

			header("Location: " . BASE_URL . "employee");
			exit();
		} else {
			if (!$result["error"]) {
				echo json_encode(["message" => ["type" => "success", "content" => "Employee deleted successfully."]]);
			} else {
				echo json_encode(["message" => ["type" => "danger", "content" => "Employee could not be deleted."]]);
			}
		}
	}

	protected function getAll()
	{
		$result = $this->model->getAll();

		if (!$result["error"]) {
			echo json_encode(["message" => ["type" => "success", "content" => "Employees fetched successfully."], "data" => $result["data"]]);
		} else {
			echo json_encode(["message" => ["type" => "danger", "content" => "Employees could not be loaded."]]);
		}
	}

	// View rendering

	protected function index()
	{
		$this->view->message = SessionHelper::popSessionValue("message");
		$this->view->render("Employee/index");
	}

	protected function new()
	{
		$this->view->render("Employee/new");
	}

	protected function edit()
	{
		$result = $this->model->get($this->params);

		if ($result["error"]) throw new Exception("Employee could not be loaded.");
		if (!$result["data"]) throw new Exception("Employee not found.");

		$this->view->employee = $result["data"];
		$this->view->render("Employee/edit");
	}
}
