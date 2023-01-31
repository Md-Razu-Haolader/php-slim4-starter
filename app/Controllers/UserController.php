<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Interfaces\UserServiceInterface;
use App\Proxies\CommonHelper;
use App\Request\Validator\UserValidator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController
{
    public function __construct(private UserServiceInterface $service)
    {
        $this->service = $service;
    }

    public function save(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $payload = $request->getParsedBody();
        UserValidator::validate($payload);

        $userData = $this->service->save($payload);
        $resData = CommonHelper::processApiResponse('User save successfully', $userData);
        $response->getBody()->write($resData);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
