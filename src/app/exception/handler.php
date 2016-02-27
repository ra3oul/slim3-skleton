<?php

/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/27/16
 * Time: 3:47 PM
 */
namespace Tourism\exception ;

use Respect\Validation\Exceptions\NestedValidationException;
use Symfony\Component\HttpFoundation\Response;
use Tourism\value_objects\JsonApiPresenter;
use Tourism\value_objects\ResponseStatuses;

class handler
{

    public  function render(\Exception $e , $response )
    {
        if ($e instanceof  NestedValidationException)
        {
            return ((new JsonApiPresenter())
                ->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setStatus(ResponseStatuses::ERROR)
                ->setDataMainKey('validation-error')
                ->setData($e->getMessages())
                ->toJsonResponse($response));
        }
    }
}