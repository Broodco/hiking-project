<?php

function dd($data): void {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

function view($name, $data = []) {
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($route) {
    header("Location: /{$route}");
}