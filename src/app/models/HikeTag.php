<?php

namespace App\Models;

class HikeTag extends Model
{
    protected static string $table = 'hikes_tags';

    public static array $fillable = [
        'hikes_id',
        'tags_id'
    ];

}