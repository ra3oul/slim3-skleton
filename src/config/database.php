<?php

return [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'port'      => '',
        'database'  => env('DB_DATABASE','tourism'),
        'username'  => env('DB_USERNAME','tourism'),
        'password'  => env('DB_PASSWORD','123456'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
];
