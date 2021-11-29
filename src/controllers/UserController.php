<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "UserModel.php";

class UserController extends Controller
{
	public function __construct()
	{
		$this->model = new UserModel();
	}

	protected function login()
	{
		echo "Se ha ejecutado el método login de user";
	}

	protected function logout()
	{
		echo "Se ha ejecutado el método logout de user";
	}
}
