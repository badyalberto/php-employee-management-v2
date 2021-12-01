<?php

require_once CLASSES . "Controller.php";
require_once MODELS . "UserModel.php";
require_once CLASSES . "View.php";

class UserController extends Controller
{
    public function __construct()
    {
        $this->model = new UserModel();
		$this->view = new View();
    }

    protected function login($params)
    {

        if (isset($_POST['username']) && isset($_POST['pass']) && $_POST['username'] != "" && $_POST['pass'] != "") {
            $result = $this->model->get($params);
            if (!$result['error']) {
                $user = $result['data'];

                if ($user && password_verify($_POST["pass"],$user['password'])) {
                    $_SESSION["username"] = $user['username'];		
					header("Location: " . BASE_URL . "/");
					exit();
                } else {
					$this->view->message = "Error Credentials";
					$this->view->render('login', []);
				}
            }
         
        }else{
			$this->view->message = "Username or Password are empty";
			$this->view->render('login', []);
		}
        //echo "Se ha ejecutado el método login de user";
    }

    protected function logout()
    {
        $sh = new SessionHelper();
        $sh->destroySession();
        header("Location: " . BASE_URL . "/");
    }
}
