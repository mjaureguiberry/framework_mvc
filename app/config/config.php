<?php

/*
config.php
Define constants
*/

// DB credentials
define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PASS", "linux17");
define ("DB_NAME", "mvc_example");


// define app path
define("APP_PATH", dirname(dirname(__FILE__)));

// define URL path
// URL path example: http://localhost/<proyect_name>/
define("PROJECT_NAME", "mvc_example");
define("URL_PATH", "http://". $_SERVER['SERVER_ADDR']. "/". PROJECT_NAME);
define("SITE_NAME", "_SITE_NAME_");


?>