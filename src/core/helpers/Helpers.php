<?php

namespace App\Core\Helpers;

class Helpers
{
    public static function dd($data): void {
        echo '<pre>';
        die(var_dump($data));
        echo '</pre>';
    }

    public static function view(string $name, $data = []) {
        extract($data);
        return require "app/views/{$name}.view.php";
    }

    public static function redirect(string $route) {
        http_response_code(302);
        header("Location: /{$route}");
    }
}