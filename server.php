<?php

define("ROOT_DIRECTORY" ,realpath(__DIR__));
define("APP_DIRECTORY" ,realpath(__DIR__).'/src/app');
define("CONFIG_DIRECTORY" ,realpath(__DIR__).'/src/config');


require __DIR__.'/vendor/autoload.php';

// Instantiate the app
$settings = require ROOT_DIRECTORY . '/src/settings.php';

$app = new \Slim\App($settings);



//@Todo implement migration and seeder cli call
switch($argv[1]){
    case 'migration':

        break;

    case 'seed':

        break;

    default:

        break;
}
