<?php

require_once CLASSES . 	"Controller.php";
require_once MODELS . 	"UserModel.php";

class UserController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new UserModel();
	}

	protected function login($params)
	{
		$result = $this->model->get($params);

		if ($result["error"]) throw new Exception("User could not be fetched.");
		if (!$result["data"]) throw new Exception("Invalid credentials.");

		$user = $result['data'];

		if (password_verify($params["password"], $user['password'])) SessionHelper::setSessionValue("username", $user['username']);

		header("Location: " . BASE_URL);
		exit();
	}

	protected function logout()
	{
		SessionHelper::popSessionValue("username");

		header("Location: " . BASE_URL);
		exit();
	}
}
