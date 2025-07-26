<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YoutubeLink;

class AdminYoutubeController extends Controller
{
    public function index()
    {
        $videos = YoutubeLink::latest()->get();
        return view('admin.youtubelink.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.youtubelink.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => [
                'required',
                'url',
                'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/'
            ],
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'order_position' => 'nullable|integer',
        ]);

        // Batasi hanya 2 video aktif
        if ($request->boolean('is_active') && YoutubeLink::where('is_active', true)->count() >= 2) {
            return redirect()->back()->withErrors(['is_active' => 'Maksimal hanya 2 video yang bisa diaktifkan.'])->withInput();
        }

        YoutubeLink::create([
            'title' => $request->title,
            'youtube_url' => $this->normalizeYoutubeUrl($request->youtube_url),
            'description' => $request->description,
            'is_active' => $request->boolean('is_active'),
            'order_position' => $request->order_position,
        ]);

        return redirect()->route('admin.youtube.index')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $video = YoutubeLink::findOrFail($id);
        return view('admin.youtubelink.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = YoutubeLink::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => [
                'required',
                'url',
                'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/'
            ],
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'order_position' => 'nullable|integer',
        ]);

        // Cek jika ingin mengaktifkan video baru
        if (!$video->is_active && $request->boolean('is_active') && YoutubeLink::where('is_active', true)->count() >= 2) {
            return redirect()->back()->withErrors(['is_active' => 'Maksimal hanya 2 video yang bisa diaktifkan.'])->withInput();
        }

        $video->update([
            'title' => $request->title,
            'youtube_url' => $this->normalizeYoutubeUrl($request->youtube_url),
            'description' => $request->description,
            'is_active' => $request->boolean('is_active'),
            'order_position' => $request->order_position,
        ]);

        return redirect()->route('admin.youtube.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy($id)
    {
        YoutubeLink::destroy($id);
        return redirect()->route('admin.youtube.index')->with('success', 'Video berhasil dihapus.');
    }

    /**
     * Ambil video ID dan ubah jadi format embed atau link pendek.
     */
    private function normalizeYoutubeUrl($url)
    {
        // Ambil ID dari berbagai format
        if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $matches) ||
            preg_match('/youtube\.com\/.*v=([^\?&]+)/', $url, $matches)) {
            return 'https://youtu.be/' . $matches[1]; // Simpan sebagai short link
        }

        return $url; // Jika gagal parsing, tetap simpan aslinya
    }
}
