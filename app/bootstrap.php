<?php

// Load config
require_once 'config/config.php';


// Auto loading core libraries
spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
});