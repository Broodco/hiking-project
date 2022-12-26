<?php

namespace App\Controllers;
use App\Core\App;
use App\Exceptions\MissingParameterException;
use App\Models\Hike;
use App\Core\Helpers\Helpers;
use App\Models\Tag;


class HikesController
{
    public function index(): void
    {
        $data = App::get('session')->get('redirection_data') ?? [];
        App::get('session')->remove('redirection_data');

        Helpers::view(
            'hikes/index',
            [
                'hikes' => Hike::hikes_with_tags_ids(),
                'tags' => Tag::tagsWithIdKeys(),
                'data' => $data
            ]
        );
    }

    public function create(): void
    {
        $tags = Tag::all();
        $availableColors = App::get('colors');

        Helpers::view('hikes/create', ['tags' => $tags, 'colors' => $availableColors ]);
    }

    public function store(): void
    {
        $parameters = [
            'name' => '',
            'distance' => '',
            'duration_hours' => '',
            'duration_minutes' => '',
            'elevation_gain' => '',
            'description' => '',
        ];

        foreach ($parameters as $property => $value) {
            if (empty($_POST[$property]) && $_POST[$property] !== '0') {
                throw new MissingParameterException('Missing parameter : ' . $property);
            }
            $parameters[$property] = $_POST[$property];
        }

        $parameters['duration'] = (string) ((int)$parameters['duration_hours'] * 60 + (int)$parameters['duration_minutes']);

        unset($parameters['duration_hours']);
        unset($parameters['duration_minutes']);

        Hike::create($parameters);
        $hikeId = Hike::getLastInsertId();

        if (!empty($_POST['tags'])) {
            $tagController = new TagsController();
            $tagController->createTagsIfNotExists($hikeId, $_POST['tags']);
        }

        Helpers::redirect('hikes');
    }

    public function show(): void
    {
        if (empty($_GET['id'])) {
            throw new \Exception('Missing required `id` parameter in uri');
        }
        $hike = Hike::findById($_GET['id']);
        $tags = Tag::tagsByHike($_GET['id']);

        $hike->formatted_duration = Helpers::minutesToTime($hike->duration);

        Helpers::view('hikes/show', ['hike' => $hike, 'tags' => $tags]);
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