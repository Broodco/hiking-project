<?php

namespace App\Controllers\Auth;

use App\Actions\LogIn;
use App\Core\App;
use App\Core\Helpers\Helpers;
use App\Exceptions\MissingParameterException;
use App\Models\User;

class RegistrationController
{
    /**
     * Show the registration view
     * @return void
     */
    public function create(): void
    {
        $data = App::get('session')->get('redirection_data') ?? [];
        App::get('session')->remove('redirection_data');

        Helpers::view('auth/register', ['data' => $data]);
    }

    /**
     * Create a new registered user
     * @return void
     * @throws MissingParameterException
     */
    public function store(): void
    {
        $parameters = [
            'first_name' => '',
            'last_name' => '',
            'user_name' => '',
            'email' => '',
            'password' => '',
        ];

        foreach ($parameters as $property => $value) {
            if (empty($_POST[$property])) {
                throw new MissingParameterException('Missing parameter : ' . $property);
            }
            $parameters[$property] = $_POST[$property];
        }

        $parameters['password'] = password_hash($parameters['password'], PASSWORD_DEFAULT);

        try {
            User::create($parameters);
            $user = User::findByParameter(['email' => $parameters['email']]);
            LogIn::login($user->id, $user->user_name);
            Helpers::redirect('', ['success' => 'Account created successfully.']);
        } catch (\Exception $exception) {
            if (str_contains($exception->getMessage(), 'Duplicate entry')) {
                if (str_contains($exception->getMessage(), 'users_user_name')) {
                    $errors[] = 'This username already exists.';
                }
                if (str_contains($exception->getMessage(), 'users_email')) {
                    $errors[] = 'This email address already exists.';
                }
            } else {
                $errors[] = 'Unknown error during registration.';
            }
            Helpers::redirect('register', ['errors' => $errors]);
        }
    }
}