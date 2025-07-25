<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class galleryController extends Controller
{
    public function index()
    {
        $galeri = Gallery::where('is_approved', true)->latest()->get();
        return view('gallery', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visitor_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:1000',
        ]);

        // Simpan foto
        $imagePath = $request->file('image')->store('galleries', 'public');

        // Simpan ke database
        Gallery::create([
            'title' => $request->visitor_name . "'s Photo",
            'image_path' => $imagePath,
            'description' => $request->description,
            'uploaded_by' => 'visitor',
            'visitor_name' => $request->visitor_name,
            'is_approved' => true, // atau false jika butuh persetujuan admin
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil diunggah!');
    }
}
