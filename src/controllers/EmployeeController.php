<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "EmployeeModel.php";

class EmployeeController extends Controller
{
	public function __construct()
	{
		$this->model = new EmployeeModel();
	}

	protected function create()
	{
		echo "Se ha ejecutado el método create de employee";
	}

	protected function update()
	{
		echo "Se ha ejecutado el método update de employee";
	}

	protected function delete()
	{
		echo "Se ha ejecutado el método delete de employee";
	}

	protected function get()
	{
		echo "Se ha ejecutado el método get de employee";
	}

	protected function getAll()
	{
		echo "Se ha ejecutado el método getAll de employee";
	}
}
