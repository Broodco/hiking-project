<?php

namespace App\Models;

class Hike extends Model
{
    protected static string $table = 'hikes';

    public static array $fillable = [
        'name',
        'distance',
        'duration',
        'elevation_gain',
        'description'
    ];

    public static function hikes_with_tags_ids(): array
    {
        $hikes = static::customQuery(
            "SELECT h.*, group_concat(t.id) as tags_ids
                FROM hikes h
                LEFT JOIN hikes_tags ht ON h.id = ht.hikes_id
                LEFT JOIN tags t ON ht.tags_id = t.id
                GROUP BY h.id;
            ", []
        );

        foreach ($hikes as $hike) {
            if (!empty($hike->tags_ids)) {
                $hike->tags_ids = explode(',', $hike->tags_ids);
            }
        }

        return $hikes;
    }

    public static function hikes_filtered_by_tags(array $tag_ids): array
    {
        $tags = implode(", ", $tag_ids);
        return static::customQuery(
            "SELECT DISTINCT h.*
            FROM hikes h
            JOIN hikes_tags ht ON h.id = ht.hikes_id
            WHERE ht.tags_id IN ({$tags});
            ", []
        );
    }
}