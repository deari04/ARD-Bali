<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'maps_embed_url' => 'nullable|string',
        ]);

        Location::create([
            'title' => $request->title,
            'address' => $request->address,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'maps_embed_url' => $request->maps_embed_url,
        ]);

        return redirect()->route('admin.location')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'maps_embed_url' => 'nullable|string',
        ]);

        $location = Location::findOrFail($id);
        $location->update([
            'title' => $request->title,
            'address' => $request->address,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'maps_embed_url' => $request->maps_embed_url,
        ]);

        return redirect()->route('admin.location')->with('success', 'Lokasi berhasil diupdate');
    }

    public function destroy($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->route('admin.location')->with('success', 'Lokasi berhasil dihapus');
    }
}