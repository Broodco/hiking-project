<?php

namespace App\Exceptions;

class SQLQueryException extends \Exception
{
    public function __construct(string $message = "Error during SQL query", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct(
            $message,
            $code,
            $previous
        );
    }
}