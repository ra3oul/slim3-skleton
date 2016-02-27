<?php

/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/27/16
 * Time: 3:05 PM
 */
namespace Tourism\services\validation;

use Psr\Http\Message\ResponseInterface;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\Response;
use Tourism\value_objects\JsonApiPresenter;
use Tourism\value_objects\ResponseStatuses;

class FooValidator
{

    public function validate($object, ResponseInterface $response)
    {


        $userValidator = v::attribute('name', v::stringType()->length(1, 32))
            ->attribute('birthdate', v::date()->age(18));
        try {
            $userValidator->assert($object);


        } catch (NestedValidationException $e) {
            return ((new JsonApiPresenter())->setStatusCode(Response::HTTP_BAD_REQUEST)->setStatus(ResponseStatuses::ERROR)->setData(($e->getMessages()))->toJsonResponse($response));

        }
    }
}