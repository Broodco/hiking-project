<?php

namespace App\Core;


class App
{
    protected static array $registry = [];

    public static function bind(string $key, mixed $value): void
    {
        static::$registry[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new \Exception("No {$key} exists in the registry.");
        }
        return static::$registry[$key];
    }
}