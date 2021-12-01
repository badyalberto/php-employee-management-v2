<?php

require_once CLASSES . "Controller.php";

class ModelFactory
{
	public function getModel($name)
	{
		$modelPath = MODELS . $name . "Model.php";
		$model = $name . "Model";

		if (!file_exists($modelPath)) {
			throw new Exception("Path for controller $name does not exist.");
		}

		require_once $path;

		if (!class_exists($model)) {
			throw new Exception("Class for controller $name does not exist.");
		};

		return new $model();
	}
}
