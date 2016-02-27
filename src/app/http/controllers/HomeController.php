<?php
namespace Tourism\http\controllers;

/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 12:51 PM
 */
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Tourism\database\migrations\CreateFooTable;
use Tourism\value_objects\JsonApiPresenter;
use Tourism\value_objects\ResponseMessages;
use Tourism\value_objects\ResponseStatuses;

class HomeController extends BaseController
{
    protected $app;
    protected $jsonApiPresenter;

    public function __construct(ContainerInterface $app)
    {
        $this->app = $app;

    }

    public function show(Request $request, Response $response, $args)
    {
<<<<<<< HEAD
//        $body = $response->getBody();
//        $body->write(json_encode(['foo'=>'bar']));
//        $response->withBody($body);
//        return $response->withHeader('Content-type', 'application/json')->withStatus(400);
        return (new JsonApiPresenter())->setData(['name' => 'foo', 'fuck' => 'it'])->setStatus(ResponseStatuses::SUCCESS)->setStatusCode(201)->setMessage(ResponseMessages::CREATED)->toJsonResponse($response);

=======
        dd(config('app'));

        $foo = new CreateFooTable();
        $foo->up();

        return $request->getMethod();
>>>>>>> 51193ff367c9ad40407d34d1e60aa10647054523
    }


}
