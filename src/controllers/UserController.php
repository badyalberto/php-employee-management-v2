<?php

require_once CLASSES . 	"Controller.php";
require_once MODELS . 	"UserModel.php";

class UserController extends Controller
{
	private UserModel $model;

	public function __construct()
	{
		parent::__construct();
		$this->model = new UserModel();
	}

	// Data Management

	protected function login()
	{
		$result = $this->model->get($this->params);

		if ($result["error"]) {
			SessionHelper::setSessionValue("message", ["type" => "danger", "content" => "Something went wrong. User could not be fetched."]);
			header("Location: " . BASE_URL);
			exit();
		}

		if (!$result["data"]) {
			SessionHelper::setSessionValue("message", ["type" => "danger", "content" => "User not found."]);
			header("Location: " . BASE_URL);
			exit();
		}

		$user = $result['data'];

		if (!password_verify($this->params["password"], $user['password'])) {
			SessionHelper::setSessionValue("message", ["type" => "danger", "content" => "Invalid credentials."]);
		} else {
			SessionHelper::setSessionValue("username", $user['username']);
			SessionHelper::setSessionValue("message", ["type" => "success", "content" => "Logged in successfully."]);
		}

		header("Location: " . BASE_URL);
		exit();
	}

	protected function logout()
	{
		SessionHelper::popSessionValue("username");

		header("Location: " . BASE_URL);
		exit();
	}

	// View rendering

	protected function index()
	{
		$this->view->message = SessionHelper::popSessionValue("message");
		$this->view->render("Login/index");
	}
}
