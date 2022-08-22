<?php


use App\Core\App;
use App\Core\Session;
use App\Core\Database\{Connection, QueryBuilder};

App::bind('database', new QueryBuilder(
    Connection::make([
        'connection' => 'mysql:host=' . getenv('DB_HOST'),
        'name' => getenv('DB_DATABASE'),
        'user' => getenv('DB_USERNAME'),
        'pass' => getenv('DB_PASSWORD'),
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ]))
);

App::bind('session', new Session());