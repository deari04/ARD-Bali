<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * Nama tabel (opsional, Laravel otomatis detect)
     */
    protected $table = 'sliders';

    /**
     * Kolom yang bisa diisi mass assignment
     */
    protected $fillable = [
        'image_path',
        'headline_text',
        'subheadline_text',
        'is_active',
        'order_position'
    ];

    /**
     * Cast tipe data untuk attribute
     */
    protected $casts = [
        'is_active' => 'boolean',
        'order_position' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Scope untuk mendapatkan slider yang aktif saja
     * Usage: Slider::active()->get()
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk mengurutkan berdasarkan posisi
     * Usage: Slider::ordered()->get()
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order_position', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Accessor untuk mendapatkan URL gambar lengkap
     * Usage: $slider->image_url
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image_path)) {
            // Return default image jika tidak ada gambar
            return asset('assets/images/default-slide.jpg');
        }

        // Jika path dimulai dengan http/https, return as is (untuk URL eksternal)
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        // Jika path dimulai dengan 'storage/', return dengan asset helper
        if (str_starts_with($this->image_path, 'storage/')) {
            return asset($this->image_path);
        }

        // Jika path dimulai dengan 'assets/', return dengan asset helper
        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }

        // Default: anggap sebagai path relatif
        return asset('storage/' . $this->image_path);
    }

    /**
     * Accessor untuk mendapatkan status text
     * Usage: $slider->status_text
     */
    public function getStatusTextAttribute()
    {
        return $this->is_active ? 'Aktif' : 'Nonaktif';
    }

    /**
     * Accessor untuk mendapatkan status badge class
     * Usage: $slider->status_badge_class
     */
    public function getStatusBadgeClassAttribute()
    {
        return $this->is_active ? 'badge bg-success' : 'badge bg-secondary';
    }

    /**
     * Mutator untuk mengeset image_path
     * Otomatis membersihkan leading slash jika ada
     */
    public function setImagePathAttribute($value)
    {
        if (!empty($value) && !str_starts_with($value, 'http')) {
            // Bersihkan leading slash
            $value = ltrim($value, '/');
        }
        
        $this->attributes['image_path'] = $value;
    }

    /**
     * Boot method untuk auto-increment order_position
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($slider) {
            // Auto set order_position jika belum di-set
            if (is_null($slider->order_position)) {
                $maxOrder = static::max('order_position') ?? 0;
                $slider->order_position = $maxOrder + 1;
            }
        });
    }

    /**
     * Method untuk mengaktifkan slider
     */
    public function activate()
    {
        $this->update(['is_active' => true]);
    }

    /**
     * Method untuk menonaktifkan slider
     */
    public function deactivate()
    {
        $this->update(['is_active' => false]);
    }

    /**
     * Method untuk toggle status
     */
    public function toggleStatus()
    {
        $this->update(['is_active' => !$this->is_active]);
    }

    /**
     * Method untuk pindah posisi ke atas
     */
    public function moveUp()
    {
        $previousSlider = static::where('order_position', '<', $this->order_position)
                                ->orderBy('order_position', 'desc')
                                ->first();

        if ($previousSlider) {
            $tempPosition = $this->order_position;
            $this->update(['order_position' => $previousSlider->order_position]);
            $previousSlider->update(['order_position' => $tempPosition]);
        }
    }

    /**
     * Method untuk pindah posisi ke bawah
     */
    public function moveDown()
    {
        $nextSlider = static::where('order_position', '>', $this->order_position)
                            ->orderBy('order_position', 'asc')
                            ->first();

        if ($nextSlider) {
            $tempPosition = $this->order_position;
            $this->update(['order_position' => $nextSlider->order_position]);
            $nextSlider->update(['order_position' => $tempPosition]);
        }
    }
}