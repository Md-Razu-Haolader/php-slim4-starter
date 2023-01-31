<?php

declare(strict_types=1);

namespace App\Request\Validator;

interface Validatable
{
    public static function validate($requestData): void;
}
