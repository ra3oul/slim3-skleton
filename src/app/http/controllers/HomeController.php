<?php
namespace Tourism\http\controllers ;
/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 12:51 PM
 */
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{

    public function show(Request $request, Response $response, $args)
    {

        return $request->getMethod();
    }


}