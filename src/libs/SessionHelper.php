<?php

class SessionHelper
{
	public static function destroySession()
	{

		if (ini_get("session.use_cookies")) {
			self::destroySessionCookie();
		}

		session_unset();
		session_destroy();
	}

	private static function destroySessionCookie()
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

	public static function checkSession()
	{
		$user = 			self::getSessionValue("user");
		$expiration = self::getSessionValue("expiration");

		if ($user) {
			if ($expiration < time()) {
				self::popSessionValue("user");
				self::setSessionValue("info", ["Session has expired."]);
			} else {
				self::setSessionValue("expiration", time() + 600);
			}
		}
	}

	public static function setSessionValue(string $key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function getSessionValue(string $key)
	{
		if (isset($_SESSION[$key])) {
			$value = $_SESSION[$key];

			return $value;
		}

		return null;
	}

	public static function popSessionValue(string $key)
	{
		if (isset($_SESSION[$key])) {
			$value = $_SESSION[$key];
			unset($_SESSION[$key]);

			return $value;
		}

		return null;
	}
}
