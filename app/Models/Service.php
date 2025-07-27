<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image_path',
        'whatsapp_message',
        'is_active',
    ];

    // Auto-generate slug saat buat/update
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
