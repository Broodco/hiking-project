<?php

namespace App\Controllers;
use App\Exceptions\MissingParameterException;
use App\Exceptions\ResourceNotFoundException;
use App\Models\Hike;
use App\Core\Helpers\Helpers;


class HikesController
{
    public function index(): void
    {
        Helpers::view('hikes/index', ['hikes' => Hike::all()]);
    }

    public function create(): void
    {
        Helpers::view('hikes/create');
    }

    public function store(): void
    {
        $parameters = [
            'name' => '',
            'distance' => '',
            'duration' => '',
            'elevation_gain' => '',
            'description' => '',
        ];

        foreach ($parameters as $property => $value) {
            if (empty($_POST[$property])) {
                throw new MissingParameterException('Missing parameter : ' . $property);
            }
            $parameters[$property] = $_POST[$property];
        }
        Hike::create($parameters);

        Helpers::redirect('hikes');
    }

    public function show(): void
    {
        if (empty($_GET['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }

        $hike = Hike::findById($_GET['id']);

        Helpers::view('hikes/show', ['hike' => $hike]);
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
            if (in_array($property, Hike::$fillable)) {
                $parameters[$property] = $value;
            }
        }

        Hike::update($_REQUEST['id'], $parameters);
    }

    public function destroy(): void
    {
        if (empty($_POST['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }

        Hike::delete($_REQUEST['id']);
    }
}