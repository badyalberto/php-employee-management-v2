<?php

abstract class Controller
{
	public function run(?string $action, ?array $params)
	{
		if (is_null($action)) 								throw new Exception("Action has not been set.");
		if (!method_exists($this, $action)) 	throw new Exception("Action '$action' does not exist (Not found).");

		$this->params = $params;
		$this->$action();
	}
}
