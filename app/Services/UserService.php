<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct()
    {
    }

    public function save(array $payload): array
    {
        // do something...
        return [
            'id' => 1,
            'first_name' => 'Jhon',
            'last_name' => 'Doe',
            'email' => 'jhon@example.com'
        ];
    }
}
