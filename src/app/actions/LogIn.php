<?php

namespace App\Actions;

use App\Core\App;

class LogIn
{
    public static function login(string $userId, string $userName)
    {
        session_regenerate_id();
        $session = App::get('session');
        $session->set('LOGGED_IN', true);
        $session->set('user_id', $userId);
        $session->set('user_name', $userName);
    }
}