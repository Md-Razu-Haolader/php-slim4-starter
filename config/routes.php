<?php

declare(strict_types=1);

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\UserController;
use Slim\App;

return function (App $app) {
    $app->group('/api/v1', function (RouteCollectorProxy $group) {
        $group->post('/users', [UserController::class, 'save']);
    });
};
