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
use Respect\Validation\Validator;
use Tourism\services\validation\FooValidator;
use Tourism\value_objects\JsonApiPresenter;
use Tourism\value_objects\ResponseMessages;
use Tourism\value_objects\ResponseStatuses;
use Symfony\Component\HttpFoundation\Response as HttpResponse  ;

class HomeController extends BaseController
{
    protected $app;
    protected $jsonApiPresenter;
    protected $fooValidator ;

    public function __construct(ContainerInterface $app,FooValidator $fooValidator)
    {
        $this->app = $app;
        $this->fooValidator=$fooValidator;

    }

    public function show(Request $request, Response $response, $args)
    {

        return (new JsonApiPresenter())
            ->setData(['name' => 'foo', 'fuck' => 'it'])
            ->setStatus(ResponseStatuses::SUCCESS)
            ->setStatusCode(HttpResponse::HTTP_ACCEPTED)
            ->setMessage(ResponseMessages::CREATED)
            ->toJsonResponse($response);


    }

    public function foo (Request $request  , Response $response , $args )
    {


          $this->fooValidator->validate((object)$request->getParsedBody(),$response);


    }


}
