<?php

namespace App\Models;

class Tag extends Model
{
    protected static string $table = 'tags';

    public static array $fillable = [
        'name'
    ];

    public static function tagsByHike(int $hike_id): array
    {
        return static::customQuery(
            "SELECT t.*
            FROM tags t
            JOIN hikes_tags ht ON t.id = ht.tags_id
            JOIN hikes h ON h.id = ht.hikes_id
            WHERE h.id = {$hike_id};
            "
        , []);
    }

    public static function tagsWithIdKeys(): array
    {
        $tags = static::all();

        $tagsWithIdKeys = [];

        foreach ($tags as $tag) {
            $tagsWithIdKeys[$tag->id] = $tag;
        }

        return $tagsWithIdKeys;
    }
}