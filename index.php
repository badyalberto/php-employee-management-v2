<?php

require_once "./config/constants.php";
require_once LIBS . "app.php";
require_once LIBS . "SessionHelper.php";

session_start();

new App();
