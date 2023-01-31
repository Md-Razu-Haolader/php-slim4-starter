<?php

declare(strict_types=1);

namespace App\Exceptions;

class InternalException extends \Exception
{
    public function __construct(string $message = 'Something went wrong')
    {
        parent::__construct($message);
    }
}
