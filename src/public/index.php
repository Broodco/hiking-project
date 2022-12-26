<?php

require 'vendor/autoload.php';
require_once 'core/bootstrap.php';

use App\Exceptions\RouteNotFoundException;
use App\Core\{Helpers\Helpers, Router, Request};


try {
    Router::load('app/routes.php')
        ->direct(Request::uri(), Request::method());
} catch (Exception $exception) {
    http_response_code ((int) $exception->getCode());
    Helpers::view('core/error',
        [
            'errorCode' => $exception->getCode(),
            'errorMessage' => $exception->getMessage()
        ]
    );
}