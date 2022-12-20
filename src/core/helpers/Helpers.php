<?php

namespace App\Core\Helpers;
use App\Core\Router;
use App\Core\Session;
use App\Core\App;

class Helpers
{
    public static function dd($data): void
    {
        die('<pre>' . var_dump($data) . '</pre>');
    }

    public static function view(string $name, $data = [])
    {
        extract($data);
        return require "app/views/{$name}.view.php";
    }

    public static function redirect(string $route, string $method, $data = [])
    {
        http_response_code(302);
        extract($data);
        App::get('session')->set('redirection_data', $data);
        Router::load('app/routes.php')
            ->direct($route, $method);
    }
}