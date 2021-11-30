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

				$actionName = $router->getActionName();
				$controller->run($actionName);
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		} else {
			if (!SessionHelper::getSessionValue('username')) {
				require_once VIEWS . "login.php";
			} else {
				header("Location: " . BASE_URL . "employee");
				exit();
			}
		}
	}
}
