<?php

require_once CLASSES . "Controller.php";

class ErrorController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	protected function index()
	{
		$this->view->message = $this->params["message"];
		$this->view->render("Error/index");
	}
}
