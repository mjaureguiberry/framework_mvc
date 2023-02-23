<?php

/*
config.php
Define constants to configure the application
*/

// DB credentials
define ("DB_HOST", "localhost");
define ("DB_USER", "_USERNAME");
define ("DB_PASS", "_PASSWORD");
define ("DB_NAME", "_DBNAME");


// define app path
define("APP_PATH", dirname(dirname(__FILE__)));

// define URL path
// URL path example: http://localhost/<proyect_name>/
define("PROJECT_NAME", "_PROYECT_NAME");
define("URL_PATH", "http://". $_SERVER['SERVER_ADDR']. "/". PROJECT_NAME);
define("SITE_NAME", "_SITE_NAME_");


?>