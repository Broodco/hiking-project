<?php

namespace App\Controllers;
use App\Exceptions\MissingParameterException;
use App\Models\User;
use App\Core\Helpers\Helpers;


class UsersController
{
    public function index(): void
    {
        Helpers::view('users/index', ['users' => User::all()]);
    }

    public function create(): void
    {
        Helpers::view('users/create');
    }

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

        Helpers::redirect('users', 'GET');
    }

    public function show(): void
    {
        if (empty($_GET['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }

        var_dump($user = User::findById($_GET['id']));

        Helpers::view('users/show', ['user' => $user]);
    }

    public function edit(): void
    {
        if (empty($_GET['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }

    }

    public function update(): void
    {
        if (empty($_REQUEST['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }

        $parameters = [];

        foreach ($_REQUEST as $property => $value) {
            if (in_array($property, User::$fillable)) {
                $parameters[$property] = $value;
            }
        }

        User::update($_REQUEST['id'], $parameters);
    }

    public function destroy(): void
    {
        if (empty($_POST['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }

        User::delete($_REQUEST['id']);
    }
}