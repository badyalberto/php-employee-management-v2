<?php

//BASE PATH -> FOR REFERENCE FILES
define("BASE_PATH", getcwd());

//BASE URL -> FOR LINK CSS AND SCRIPTS

$url = explode("\\", getcwd());
unset($url[0]);
unset($url[1]);
unset($url[2]);

$urlResolve = "http://$_SERVER[HTTP_HOST]/";
foreach ($url as $key => $value) {
    $urlResolve = $urlResolve . "/" . $value;
}

define("BASE_URL", $urlResolve);
//define("BASE_URL", "http://$_SERVER[HTTP_HOST]/");

