<?php
/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 2:39 PM
 */



$slimContainer = $app->getContainer();
$config = $slimContainer->get('config');




$settings = $config->get('database');

// Bootstrap Eloquent ORM
$container = new Illuminate\Container\Container;

$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
$conn = $connFactory->make($settings);
$resolver = new \Illuminate\Database\ConnectionResolver();
$resolver->addConnection('default', $conn);
$resolver->setDefaultConnection('default');
\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
