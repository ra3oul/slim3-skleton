<?php

if (PHP_SAPI == 'cli-server.php') {
    // To help the built-in PHP dev server.php, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

define("ROOT_DIRECTORY", realpath(__DIR__) . '/../');
define("APP_DIRECTORY", realpath(__DIR__) . '/../src/app');
define("CONFIG_DIRECTORY", realpath(__DIR__) . '/../src/config');


//Bootstrap Environment Variables
$localConfigArray = require ROOT_DIRECTORY . 'env.php';
foreach ($localConfigArray as $k => $v) {
    putenv("$k=$v");
}


require __DIR__ . '/../vendor/autoload.php';

//session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);


$c = $app->getContainer();
$c['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {


        $globalExceptionHandler = new Tourism\exception\handler();
        return $globalExceptionHandler->render($exception, $response);

    };
};


require __DIR__ . '/../src/helpers.php';

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

require __DIR__ . '/../src/bootstrap.php';
// Run app
$app->run();
