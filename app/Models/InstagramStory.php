<?php

// app/Models/InstagramStory.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramStory extends Model
{
    protected $fillable = ['story_url', 'is_active'];
}
