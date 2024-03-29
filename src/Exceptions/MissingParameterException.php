<?php

namespace App\Exceptions;

class MissingParameterException extends \Exception
{
    public function __construct(string $message = "Missing parameter", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct(
            $message,
            $code,
            $previous
        );
    }

}