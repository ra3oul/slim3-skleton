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
use Tourism\value_objects\ResponseMessages;
use Tourism\value_objects\ResponseStatuses;

class FooValidator
{

    public function validate($object, ResponseInterface $response)
    {


        $userValidator = v::attribute('name', v::stringType()->length(1, 32))
            ->attribute('birthdate', v::date()->age(18));
            $userValidator->assert($object);

    }
}