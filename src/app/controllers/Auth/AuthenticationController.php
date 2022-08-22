<?php

namespace App\Controllers\Auth;

use App\Core\App;
use App\Core\Helpers\Helpers;
use App\Models\User;

class AuthenticationController
{
    /*
     * Show the login page
     */
    public function create()
    {
        Helpers::view('auth/login');
    }

    /*
     * Handle authentication request
     */
    public function store()
    {
        if (!isset($_POST['email'], $_POST['password'])) {
            throw new \Exception('Login request without required parameters.');
        }

        $user = User::findByParameter(['email' => $_POST['email']]);

        if (empty($user)) {
            $errors[] = 'User not found !';
            return Helpers::view('auth/login', ['errors' => $errors]);
        }

        if (password_verify($_POST['password'], $user->password)) {
            session_regenerate_id();
            $session = App::get('session');
            $session->set('LOGGED_IN', true);
            $session->set('user_id', $user->id);
            $session->set('user_name', $user->user_name);

            return Helpers::view('hikes/index', ['success' => 'Authentication attempt successful']);
        } else {
            // Handle wrong auth attempt.
            $errors[] = 'Wrong password !';
            return Helpers::view('auth/login', ['errors' => $errors]);
        }

    }

    /*
     * Destroy an authenticated session
     */
    public function destroy()
    {

    }
}