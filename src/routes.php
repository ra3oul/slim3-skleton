<?php
// Routes
$app->get('/', function ($request, $response, $args) {

    var_dump($this->config->get('database.driver'));
    die();
});



$app->get('/foo','Tourism\http\controllers\HomeController:show');
$app->post('/foo','Tourism\http\controllers\HomeController:foo');



//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    $foo = new \Tourism\http\controllers\HomeController();
//     var_dump($foo);
//
//
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
