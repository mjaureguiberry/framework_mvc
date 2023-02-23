<?php
/*
starter.php
- Includes files needed to start the web page
- Should be called by public/index.php
*/

// Load config file
require_once("config/config.php");

// Autoload libraries (PHP classes)
spl_autoload_register(function($className) {
    require_once("lib/". $className . ".php");
});

?>
