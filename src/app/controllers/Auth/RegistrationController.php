<?php

namespace App\Controllers\Auth;

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
        Helpers::view('auth/register');
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

        User::create($parameters);

        Helpers::redirect('');
    }
}