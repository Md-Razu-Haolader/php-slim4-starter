<?php

declare(strict_types=1);

$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions([
    App\Controllers\UserController::class => DI\autowire()
        ->constructor(DI\get('App\Services\UserService')),
]);
$container = $containerBuilder->build();
return $container;
