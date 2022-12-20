<?php

namespace App\Controllers;

use App\Models\Tag;

class TagsController
{
    public function index(): array
    {
        return Tag::all();
    }

    public function hike_tags(int $hike_id): array
    {
        return Tag::tagsByHike($hike_id);
    }

    public function createTagsIfNotExists(array $tags): void
    {
        //TODO
    }

    public function createTags(): void
    {
        //TODO
    }

    public function addTagToHike(): void
    {
        //TODO
    }
}