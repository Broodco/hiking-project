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

App::bind('colors',
[
    'slate-100' => 'f1f5f9',
    'gray-100' => 'f3f4f6',
    'zinc-100' => 'f4f4f5',
    'stone-100' => 'f5f5f4',
    'red-100' => 'fee2e2',
    'amber-100' => 'fef3c7',
    'yellow-100' => 'fef9c3',
    'lime-100' => 'ecfccb',
    'green-100' => 'dcfce7',
    'emerald-100' => 'd1fae5',
    'teal-100' => 'ccfbf1',
    'cyan-100' => 'cffafe',
    'sky-100' => 'e0f2fe',
    'blue-100' => 'dbeafe',
    'indigo-100' => 'e0e7ff',
    'violet-100' => 'ede9fe',
    'purple-100' => 'f3e8ff',
    'fuchsia-100' => 'fae8ff',
    'pink-100' => 'fce7f3',
    'rose-100' => 'ffe4e6',
]);