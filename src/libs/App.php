<?php

require_once LIBS . "ControllerFactory.php";
require_once LIBS . "Router.php";
require_once CONTROLLERS . "ErrorController.php";
require_once CONTROLLERS . "UserController.php";

class App
{
	public function __construct()
	{
		$router = new Router();
		$controllerName = $router->getControllerName();
		$actionName = 		$router->getActionName();

		try {
			if ($controllerName) {
				$controllerFactory = new ControllerFactory();
				$controller = $controllerFactory->getController($controllerName);
				$controller->setParams($_REQUEST);
				$controller->setAction($actionName);
				$controller->run();
			} else {
				if (SessionHelper::getSessionValue('username')) {
					header("Location: " . BASE_URL . "employee");
					exit();
				}

				$controller = new UserController();
				$controller->run();
			}
		} catch (Exception $e) {
			$controller = new ErrorController();
			$controller->setParams(["message" => $e->getMessage()]);
			$controller->run();
		}
	}
}
