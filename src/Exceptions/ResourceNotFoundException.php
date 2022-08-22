<?php

namespace App\Exceptions;

class ResourceNotFoundException extends \Exception
{
    public function __construct(string $message = "Resource does not exist", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct(
            $message,
            $code,
            $previous
        );
    }

}