<?php
/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 2:39 PM
 */


$settings = array(
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'tourism',
    'username' => 'root',
    'password' => '12345',
    'collation' => 'utf8_general_ci',
    'prefix' => ''
);

// Bootstrap Eloquent ORM
$container = new Illuminate\Container\Container;

$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
$conn = $connFactory->make($settings);
$resolver = new \Illuminate\Database\ConnectionResolver();
$resolver->addConnection('default', $conn);
$resolver->setDefaultConnection('default');
\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);