<?php

namespace App\Core\Database;


class QueryBuilder
{


    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);

    }

    public function insert(string $table, array $parameters): void
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        //TODO Prepare data for insertion
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($parameters);
    }
}