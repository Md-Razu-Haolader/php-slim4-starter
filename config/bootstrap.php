<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$container = require __DIR__ . '/../config/dependencies.php';
$app = DI\Bridge\Slim\Bridge::create($container);


$app->addBodyParsingMiddleware();
/**
 * The routing middleware should be added earlier than the ErrorMiddleware
 * Otherwise exceptions thrown from it will not be handled by the middleware
 */
$app->addRoutingMiddleware();

(require __DIR__ . '/../config/error_handler.php')($app);
(require __DIR__ . '/../config/routes.php')($app);

return $app;
