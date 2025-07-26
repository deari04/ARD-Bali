<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeLink extends Model
{
    protected $fillable = [
        'title',
        'youtube_url',
        'description',
        'is_active',
        'order_position',
    ];

    // Accessor untuk mendapatkan video ID
    public function getYoutubeIdAttribute()
    {
        preg_match(
            '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $this->youtube_url,
            $matches
        );

        return $matches[1] ?? null;
    }
}
