<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

define("ROOT_DIRECTORY" ,realpath(__DIR__).'/../');
define("APP_DIRECTORY" ,realpath(__DIR__).'/../src/app');
define("CONFIG_DIRECTORY" ,realpath(__DIR__).'/../src/config');




require __DIR__ . '/../vendor/autoload.php';

//session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

require __DIR__ . '/../src/bootstrap.php';
// Run app
$app->run();
