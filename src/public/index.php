<?php

require 'vendor/autoload.php';
require_once 'core/bootstrap.php';

use App\Core\{Router, Request};


try {
    Router::load('app/routes.php')
        ->direct(Request::uri(), Request::method());
} catch (\App\Exceptions\ResourceNotFoundException $exception) {
    http_response_code ((int) $exception->getCode());
    \App\Core\Helpers\Helpers::view('core/404');
} catch (\Exception $exception) {
    http_response_code((int) $exception->getCode());
    echo '<h1>Error : </h1><br>' . $exception->getMessage();
}