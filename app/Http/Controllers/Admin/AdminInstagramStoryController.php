<?php

// app/Http/Controllers/AdminInstagramStoryController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ perbaikan di sini
use Illuminate\Http\Request;
use App\Models\InstagramStory;

class AdminInstagramStoryController extends Controller
{
    public function index()
    {
        $stories = InstagramStory::all();
        return view('admin.instagram.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.instagram.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'story_url' => 'required|url',
        ]);

        InstagramStory::create([
            'story_url' => $request->story_url,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.instagram.index')->with('success', 'Link story berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $story = InstagramStory::findOrFail($id);
        return view('admin.instagram.edit', compact('story'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'story_url' => 'required|url',
        ]);

        $story = InstagramStory::findOrFail($id);
        $story->update([
            'story_url' => $request->story_url,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.instagram.index')->with('success', 'Link story berhasil diperbarui.');
    }

    public function destroy($id)
    {
        InstagramStory::destroy($id);
        return back()->with('success', 'Link story berhasil dihapus.');
    }
}
