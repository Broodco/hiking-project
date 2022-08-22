<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    public function get(string $key): mixed
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public function set(string $key, mixed $value): self
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function remove(string $key): void
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function clear(): void
    {
        session_unset();
    }
}