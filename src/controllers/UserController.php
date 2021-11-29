<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "UserModel.php";

class UserController extends Controller
{
	public function __construct()
	{
		$this->model = new UserModel();
	}

	protected function get()
	{
		echo "Se ha ejecutado el método get de user";
	}
}
