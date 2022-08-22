<?php

namespace App\Models;

use App\Exceptions\ResourceNotFoundException;

class User extends Model
{
    protected static string $table = 'users';

    public static array $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password'
    ];

    public function getUserByEmail(string $email): object
    {
        return User::findByParameter(['email' => $email]);
    }
}