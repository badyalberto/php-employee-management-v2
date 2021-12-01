<?php

require_once CLASSES . "Controller.php";

class ControllerFactory
{
	public function getController(string $name): Controller
	{
		$controllerPath = CONTROLLERS . $name . "Controller.php";
		$controller = $name . "Controller";

		if (!file_exists($controllerPath)) {
			throw new Exception("Path for controller $name does not exist.");
		}

		require_once $controllerPath;

		if (!class_exists($controller)) {
			throw new Exception("Class for controller $name does not exist.");
		};

		return new $controller();
	}
}
