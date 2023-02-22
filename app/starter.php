<?php
/*
starter.php
- Includes controllers, models, views, libraries and helpers 
- Can be called by index.php
*/

// Load config file
require_once("config/config.php");

// Autoload libraries (PHP classes)
spl_autoload_register(function($className) {
    require_once("lib/". $className . ".php");
});

?>
