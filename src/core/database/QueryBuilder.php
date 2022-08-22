<?php

namespace App\Core\Database;


use App\Exceptions\SQLQueryException;
use App\Core\Helpers\Helpers;
use PDO;

class QueryBuilder
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Execute statement
     *
     * @throws SQLQueryException
     */
    public function executeQuery(string $sql, array $params = []): \PDOStatement
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;

        } catch (Exception $exception) {
            throw new SQLQueryException($exception->getMessage());
        }
    }

    /**
     * Select all rows from a table
     *
     * @throws SQLQueryException
     */
    public function selectAll($table): array
    {
        $sql = "SELECT * FROM {$table}";

        return $this->executeQuery($sql)->fetchAll(\PDO::FETCH_OBJ);
    }

    /*
     * Select a row from a table, filter by ID
     */
    public function findById($table, $id): array
    {
        $sql = "SELECT * FROM {$table} WHERE id = {$id}";

        return $this->executeQuery($sql)->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Select a row from a table, filter by an array of conditions
     *
     * @throws SQLQueryException
     */
    public function find($table, $conditions): object|bool
    {
        $sql = sprintf(
            'SELECT * FROM %s WHERE %s',
            $table,
            implode(' AND ', array_map(
                function ($key) {
                    return "{$key} = :w_{$key}";
                },
                array_keys($conditions)
            ))
        );

        $conditions = array_combine(
            array_map(function($key){ return ":w_{$key}"; }, array_keys($conditions)),
            $conditions
        );

        return $this->executeQuery($sql, $conditions)->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Insert a new record in a table
     *
     * @throws SQLQueryException
     */
    public function insert(string $table, array $parameters): void
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $this->executeQuery($sql, $parameters);
    }

    /**
     * Update a row from a table
     *
     * @throws SQLQueryException
     */
    public function update(string $table, array $parameters, array $conditions): void
    {
        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s",
            $table,
            implode(', ', array_map(
                function ($key) {
                    return "{$key} = :s_{$key}";
                },
                array_keys($parameters)
            )),
            implode(' AND ', array_map(
                function ($key) {
                    return "{$key} = :w_{$key}";
                },
                array_keys($conditions)
            ))
        );

        $parameters = array_combine(
                array_map(function($key){ return ":s_{$key}"; }, array_keys($parameters)),
                $parameters
            ) + array_combine(
                array_map(function($key){ return ":w_{$key}"; }, array_keys($conditions)),
                $conditions
            );

        $this->executeQuery($sql, $parameters);
    }

    /**
     * Delete a record from a table
     *
     * @throws SQLQueryException
     */
    public function destroy(string $table, array $conditions): void
    {
        $sql = sprintf(
            'DELETE FROM %s WHERE %s',
            $table,
            implode(' AND ', array_map(
                function ($key) {
                    return "{$key} = :w_{$key}";
                },
                array_keys($conditions)
            ))
        );

        $conditions = array_combine(
            array_map(function($key){ return ":w_{$key}"; }, array_keys($conditions)),
            $conditions
        );

        $this->executeQuery($sql, $conditions);
    }
}