<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class DashboardGalleryController extends Controller
{
    public function index()
    {
        $galleryItems = Gallery::latest()->get();
        return view('admin.dashboardgallery.dashboardgallery', compact('galleryItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'komentar' => 'nullable|string',
            'foto'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto')->store('galleries', 'public');

        Gallery::create([
            'title'        => $request->nama,
            'description'  => $request->komentar,
            'image_path'   => $path,
            'uploaded_by'  => 'admin',
            'visitor_name' => null,
            'is_approved'  => true,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'komentar'  => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);

        $gallery->title       = $request->nama;
        $gallery->description = $request->komentar;

        if ($request->hasFile('foto')) {
            if (Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $gallery->image_path = $request->file('foto')->store('galleries', 'public');
        }

        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus.');
    }
}
