<?php

class View
{
	public function render(string $name, array $params = [])
	{
		$fullpath = VIEWS . $name . ".php";

		if (!file_exists($fullpath)) throw new Exception("Path for the view file does not exist.");

		require_once $fullpath;
	}
}
