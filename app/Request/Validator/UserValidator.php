<?php

declare(strict_types=1);

namespace App\Request\Validator;

use App\Exceptions\ValidationException;
use App\Request\Validator\Validatable;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

class UserValidator implements Validatable
{
    public static function validate($reqData): void
    {
        try {
            $userValidator = Validator::key('firstName', Validator::notEmpty())
                ->key('lastName', Validator::notEmpty())
                ->key('email', Validator::notEmpty()->noWhitespace()->email());
            $userValidator->assert($reqData);
        } catch (NestedValidationException $e) {
            throw ValidationException::withErrors($e->getMessages());
        }
    }
}
