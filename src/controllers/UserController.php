<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "UserModel.php";

class UserController extends Controller
{
	public function __construct()
	{
		$this->model = new UserModel();
	}

	protected function login($params)
	{

		if (isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != "" && $_POST['password'] != "") {
			$result = $this->model->get($params);
			if (!$result['error']) {
				$user = $result['data'];

				if ($user && password_verify($_POST["password"], $user['password'])) {
					$_SESSION["username"] = $user['username'];
				}

				header("Location: " . BASE_URL . "/");
				exit();
			}
		}
		//echo "Se ha ejecutado el método login de user";
	}

	protected function logout()
	{
		$sh = new SessionHelper();
		$sh->destroySession();
		header("Location: " . BASE_URL . "/");
	}
}
