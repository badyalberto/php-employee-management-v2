<?php

abstract class Controller
{
	protected ?array $params;

	public function __construct()
	{
		$this->params = $_REQUEST;
	}

	public function run(?string $action)
	{
		if (is_null($action)) $action = "index";
		if (!method_exists($this, $action)) throw new Exception("Action '$action' does not exist (Not found).");

		$this->$action($this->params);
	}
}
