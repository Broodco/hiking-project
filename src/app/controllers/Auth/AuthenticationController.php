<?php

namespace App\Controllers\Auth;

use App\Actions\LogIn;
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
        $session = App::get('session');
        if ($session->get('LOGGED_IN')) {
            Helpers::redirect('hikes', 'GET', ['errors' => ['Already logged in.']]);
        }

        $data = App::get('session')->get('redirection_data') ?? [];
        App::get('session')->remove('redirection_data');
        Helpers::view('auth/login', ['data' => $data]);
    }

    /*
     * Handle authentication request
     */
    public function store(): void
    {
        if (!isset($_POST['email'], $_POST['password'])) {
            throw new \Exception('Login request without required parameters.');
        }

        try {
            $user = User::findByParameter(['email' => $_POST['email']]);
        } catch (\Exception $exception) {
            $errors[] = 'User not found !';
            Helpers::redirect('login', 'GET', ['errors' => $errors]);
            return;
        }

        if (empty($user)) {
            $errors[] = 'User not found !';
            Helpers::redirect('login', 'GET', ['errors' => $errors]);
            return;
        }

        if (password_verify($_POST['password'], $user->password)) {
            LogIn::login($user->id, $user->user_name);
            Helpers::redirect('hikes', 'GET', ['success' => 'Authentication attempt successful']);
        } else {
            // Handle wrong auth attempt.
            $errors[] = 'Wrong password !';
            Helpers::redirect('login', 'GET', ['errors' => $errors]);
        }
    }

    /*
     * Destroy an authenticated session
     */
    public function destroy(): void
    {
        $session = App::get('session');
        if ($session->get('LOGGED_IN') === true) {
            $session->clear();
            session_regenerate_id();
            Helpers::redirect('hikes', 'GET', ['success' => 'Successfully logged out. Come back soon !']);
            return;
        }
        Helpers::redirect('hikes', 'GET', ['errors' => ['Already logged out.']]);
    }
}