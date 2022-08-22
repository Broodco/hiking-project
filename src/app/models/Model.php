<?php

namespace App\Models;

use App\Core\App;
use App\Core\Database\QueryBuilder;
use App\Core\Helpers\Helpers;
use App\Exceptions\ResourceNotFoundException;

abstract class Model
{
    protected static string $table;

    protected static array $fillable;

    protected static function newQuery(): QueryBuilder
    {
        return App::get('database');
    }

    public static function all(): array
    {
        return static::newQuery()->selectAll(static::$table);
    }

    public static function findByParameter(array $conditions): object
    {
        $resource = static::newQuery()->find(static::$table, $conditions);

        if (empty($resource)) {
            throw new ResourceNotFoundException();
        }

        return $resource;

    }

    public static function findById(int $id): object
    {
        $resource = static::newQuery()->find(static::$table, ['id' => $id]);

        if (empty($resource)) {
            throw new ResourceNotFoundException();
        }

        return $resource;
    }

    public static function create(array $parameters): void
    {
        static::newQuery()->insert(static::$table, $parameters);
    }

    public static function update(int $id, array $parameters): void
    {
        if (!empty($parameters)) {
            static::newQuery()->update(static::$table, $parameters, ['id' => $id]);
        }
    }

    public static function delete(int $id): void
    {
        static::newQuery()->destroy(static::$table, ['id' => $id]);
    }
}