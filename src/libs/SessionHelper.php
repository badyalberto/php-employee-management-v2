<?php

class SessionHelper
{
    public function destroySession()
    {

        if (ini_get("session.use_cookies")) {
            $this->destroySessionCookie();
        }
        session_unset();
        session_destroy();
    }

    /*  public function destroySession()
    {
    // Start session
    if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    }

    //session_start();

    // Unset all session variables
    unset($_SESSION);

    // Destroy session cookie
    //$this->destroySessionCookie();

    // Destroy the session
    session_destroy();

    if (!headers_sent()) {
    header("Location: ../../index.php");
    exit;
    }

    //header("Location: ../index.php");
    }
     */
    public function destroySessionCookie()
    {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    }
}
