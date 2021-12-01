<?php

require_once CLASSES . "View.php";

abstract class Controller
{
	protected string $action;
	protected array $params;
	protected View $view;

	public function __construct()
	{
		$this->action = "index";
		$this->params = [];
		$this->view = new View();
	}

	public function run()
	{
		$action = $this->action;

		if (!method_exists($this, $action)) throw new Exception("Resource not found.");

		$this->$action($this->params);
	}

	public function setParams(?array $params)
	{
		$this->params = $params ?? [];
	}

	public function getParams()
	{
		return $this->params;
	}

	public function setAction(?string $action)
	{
		$this->action = $action ?? "index";
	}

	public function getAction()
	{
		return $this->action;
	}
}
