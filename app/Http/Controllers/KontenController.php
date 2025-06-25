<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konten;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    // Menampilkan halaman kelola konten
    public function index()
    {
        $kontens = Konten::latest()->get();
        return view('admin.konten', compact('kontens'));
    }

    // Menyimpan konten baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto')->store('uploads', 'public');

        Konten::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'foto' => $path,
        ]);

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan!');
    }

    // Menghapus konten
    public function destroy($id)
    {
        $konten = Konten::findOrFail($id);
        if ($konten->foto) {
            Storage::disk('public')->delete($konten->foto);
        }
        $konten->delete();

        return redirect()->back()->with('success', 'Konten berhasil dihapus!');
    }

    // (Opsional) Mengedit konten
    public function update(Request $request, $id)
    {
        $konten = Konten::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($konten->foto) {
                Storage::disk('public')->delete($konten->foto);
            }
            $path = $request->file('foto')->store('uploads', 'public');
            $konten->foto = $path;
        }

        $konten->nama = $request->nama;
        $konten->deskripsi = $request->deskripsi;
        $konten->kategori = $request->kategori;
        $konten->save();

        return redirect()->back()->with('success', 'Konten berhasil diperbarui!');
    }
}

