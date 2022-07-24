<?php

namespace App\Core\Database;


class Connection
{
    public static function make($config): \PDO
    {
        try {
            return new \PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['user'],
                $config['pass'],
                $config['options']
            );
        } catch (\PDOException $e) {
            die('Could not connect to the database : ' . PHP_EOL . PHP_EOL . $e->getMessage());
        }

    }
}