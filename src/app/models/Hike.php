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
}