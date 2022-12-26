<?php

namespace App\Controllers;

use App\Core\Helpers\Helpers;
use App\Models\HikeTag;
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

    public function createTagsIfNotExists(string $hikeId, array $tags): void
    {
        $existingTags = Tag::all();
        $tagsIds = [];
        foreach ($tags as $tagName => $tagColor) {
            if (!in_array(strtolower($tagName), array_column($existingTags, 'name'))) {
                $this->createTag($tagName, $tagColor);
                $tagsIds[] = Tag::getLastInsertId();
            } else {
                $tagsIds[] = array_search($tagName, array_column($existingTags, 'name', 'id'));
            }
        }
        $this->addTagsToHike($hikeId, $tagsIds);
    }

    public function createTag(string $name, string $color): void
    {
        Tag::create([
            'name' => $name,
            'color' => $color
        ]);
    }

    public function addTagsToHike(string $hikeId, array $tagIds): void
    {
        foreach($tagIds as $tagId) {
            $this->addTagToHike($hikeId, $tagId);
        }
    }

    public function addTagToHike(string $hikeId, string $tagId): void
    {
        HikeTag::create([
            'hikes_id' => $hikeId,
            'tags_id' => $tagId
        ]);
    }
}