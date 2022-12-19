<?php

require 'vendor/autoload.php';
require_once 'core/bootstrap.php';

use App\Exceptions\RouteNotFoundException;
use App\Core\{Helpers\Helpers, Router, Request};


try {
    Router::load('app/routes.php')
        ->direct(Request::uri(), Request::method());
} catch (RouteNotFoundException $exception) {
    http_response_code ((int) $exception->getCode());
    Helpers::view('core/404');
} catch (\Exception $exception) {
    http_response_code((int) $exception->getCode());
    echo '<h1>Error : </h1><br>' . $exception->getMessage();
}