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
        'image' // jika kategori punya gambar sendiri
    ];

    /**
     * Relasi ke layanan (services)
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}
