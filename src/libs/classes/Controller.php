<?php

abstract class Controller
{
	public function run(?string $action, ?array $params)
	{
		if (is_null($action)) $action = "index";
		if (!method_exists($this, $action)) 	throw new Exception("Action '$action' does not exist (Not found).");

		$this->$action($params);
	}
}
