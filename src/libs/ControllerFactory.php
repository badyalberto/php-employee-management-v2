<?php

require_once CLASSES . "Controller.php";

class ControllerFactory
{
	public function getController(string $name): Controller
	{
		$path = $this->getPath($name);
		$controller = $name . "Controller";

		if (!file_exists($path)) {
			throw new Exception("Path for controller $name does not exist.");
		}

		require_once $path;

		if (!class_exists($controller)) {
			throw new Exception("Class for controller $name does not exist.");
		};

		return new $controller();
	}

	public function getPath(string $name): string
	{
		return CONTROLLERS . $name . "Controller.php";
	}
}
