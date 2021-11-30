<?php

require_once LIBS . "ControllerFactory.php";
require_once LIBS . "Router.php";

class App
{
	public function __construct()
	{
		$router = new Router();
		$controllerName = $router->getControllerName();


		if ($controllerName) {
			try {
				$controllerFactory = new ControllerFactory();
				$controller = $controllerFactory->getController($controllerName);
		
				$action = $router->getActionName();
				$params = $router->getParams();
		
				$controller->run($action, $params);
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		} else {
			if (!isset($_SESSION['username'])) {
				require_once VIEWS . "login.php";
			} else {
				header("Location: " . BASE_URL . "/employee");
			}
		}
	}
}

