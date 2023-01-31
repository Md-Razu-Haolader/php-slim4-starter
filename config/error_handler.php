<?php

declare(strict_types=1);

use App\Exceptions\ResourceNotFoundException;
use App\Exceptions\ValidationException;
use App\Exceptions\InvalidResponseException;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger  
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */

// Define Custom Error Handler
return function (App $app) {
    $customErrorHandler = function (ServerRequestInterface $request, Throwable $exception) use ($app) {
        $errorData = ['message' => $exception->getMessage()];
        if (isset($exception->errors) && !empty($exception->errors)) {
            $errorData['errors'] = $exception->errors;
        }
        $response = $app->getResponseFactory()->createResponse();
        $statusCode = 500;
        if (
            $exception instanceof ValidationException
        ) {
            $statusCode = 422;
        } else if ($exception instanceof ResourceNotFoundException) {
            $statusCode = 404;
        } else if ($exception instanceof InvalidResponseException) {
            $statusCode = 502;
        }
        $response->getBody()->write(json_encode($errorData));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($statusCode);
    };

    $errorMiddleware = $app->addErrorMiddleware(true, true, true);
    $errorMiddleware->setDefaultErrorHandler($customErrorHandler);
};
