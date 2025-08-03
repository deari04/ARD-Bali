<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon_class',
        'is_active',
        'order_position',
        'image_path' // Ganti 'image' dengan 'image_path' untuk konsistensi
    ];

    // Tambahkan cast untuk memastikan tipe data yang benar
    protected $casts = [
        'is_active' => 'boolean',
        'order_position' => 'integer',
    ];

    /**
     * Relasi ke layanan (services)
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}