<?php

class Router
{
	private ?string $controllerName;
	private ?string $actionName;
	private ?string $id;
	private ?array 	$params;

	public function __construct()
	{
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = trim($url, '/');
			$url = explode('/', $url);

			$this->controllerName = $url[0] ?? null;
			$this->actionName = 		$url[1] ?? null;
			$this->id = 						$url[2] ?? null;
		} else {
			$this->controllerName = null;
			$this->actionName = 		null;
			$this->id = 						null;
		}
	}

	public function getControllerName()
	{
		return $this->controllerName;
	}

	public function getActionName()
	{
		return $this->actionName;
	}

	public function getId()
	{
		return $this->id;
	}
}
