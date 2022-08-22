<?php

namespace App\Core;

use App\Exceptions\RouteNotFoundException;
use App\Controllers\{PagesController, UsersController};


class Router
{

    protected array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function load($file): Router
    {
        $router = new static();

        require $file;

        return $router;
    }

    public function get(string $uri, string $controller): void
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post(string $uri, string $controller): void
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new RouteNotFoundException('No route found for uri = ' . $uri);
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new RouteNotFoundException("{$controller} does not contain the action {$action}.");
        }

        return $controller->$action();
    }
}