<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Tampilkan daftar slider
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Form tambah slider
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Simpan slider baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'headline_text' => 'required|string|max:255',
            'subheadline_text' => 'nullable|string',
            'order_position' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $imagePaths = [];

        // Simpan semua foto
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('sliders', 'public');
                $imagePaths[] = 'storage/' . $path;
            }
        }

        Slider::create([
            'headline_text' => $request->headline_text,
            'subheadline_text' => $request->subheadline_text,
            'order_position' => $request->order_position ?? 0,
            'is_active' => $request->has('is_active'),
            'image_path' => json_encode($imagePaths)
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil ditambahkan');
    }

    /**
     * Form edit slider
     */
    public function edit(Slider $slider)
    {
        // Pastikan image_path selalu berupa array
        $slider->image_path = is_string($slider->image_path)
            ? json_decode($slider->image_path, true)
            : ($slider->image_path ?? []);

        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update slider
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'headline_text' => 'required|string|max:255',
            'subheadline_text' => 'nullable|string',
            'order_position' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'remove_images' => 'nullable|array'
        ]);

        // Ambil foto lama
        $existingImages = is_string($slider->image_path)
            ? json_decode($slider->image_path, true)
            : ($slider->image_path ?? []);

        // Hapus foto yang dipilih user
        if ($request->filled('remove_images')) {
            foreach ($request->remove_images as $index) {
                if (isset($existingImages[$index])) {
                    $filePath = str_replace('storage/', '', $existingImages[$index]);
                    if (Storage::disk('public')->exists($filePath)) {
                        Storage::disk('public')->delete($filePath);
                    }
                    unset($existingImages[$index]);
                }
            }
        }

        // Reindex array setelah hapus
        $existingImages = array_values($existingImages);

        // Tambah foto baru jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('sliders', 'public');
                $existingImages[] = 'storage/' . $path;
            }
        }

        // Update slider
        $slider->update([
            'headline_text' => $request->headline_text,
            'subheadline_text' => $request->subheadline_text,
            'order_position' => $request->order_position ?? 0,
            'is_active' => $request->has('is_active'),
            'image_path' => json_encode($existingImages)
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil diupdate');
    }

    /**
     * Hapus slider
     */
    public function destroy(Slider $slider)
    {
        // Hapus semua foto dari storage
        $images = is_string($slider->image_path)
            ? json_decode($slider->image_path, true)
            : ($slider->image_path ?? []);

        foreach ($images as $img) {
            $filePath = str_replace('storage/', '', $img);
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }

        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil dihapus');
    }
}
