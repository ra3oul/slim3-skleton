<?php
namespace Tourism\http\controllers ;
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

class HomeController extends BaseController
{
    protected $app ;

    public function __construct(ContainerInterface $app )
    {
        $this->app=$app;

    }

    public function show(Request $request, Response $response, $args)
    {

        var_dump($this->app->get('config')->get('database'));
        die();
        $foo = new CreateFooTable();
        $foo->up();

        return $request->getMethod();
    }


}
