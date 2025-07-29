<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::ordered()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'headline_text' => 'required|string|max:255',
            'subheadline_text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
            'is_active' => 'boolean',
            'order_position' => 'integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = null;

        // Handle image upload or URL
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
            $imagePath = 'storage/' . $imagePath;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        Slider::create([
            'headline_text' => $request->headline_text,
            'subheadline_text' => $request->subheadline_text,
            'image_path' => $imagePath,
            'is_active' => $request->has('is_active'),
            'order_position' => $request->order_position ?? 0
        ]);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'headline_text' => 'required|string|max:255',
            'subheadline_text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
            'is_active' => 'boolean',
            'order_position' => 'integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = $slider->image_path;

        // Handle image upload or URL
        if ($request->hasFile('image')) {
            // Delete old image if it's a local file
            if ($slider->image_path && !str_starts_with($slider->image_path, 'http')) {
                $oldImagePath = str_replace('storage/', '', $slider->image_path);
                Storage::disk('public')->delete($oldImagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
            $imagePath = 'storage/' . $imagePath;
        } elseif ($request->filled('image_url')) {
            // Delete old image if it's a local file
            if ($slider->image_path && !str_starts_with($slider->image_path, 'http')) {
                $oldImagePath = str_replace('storage/', '', $slider->image_path);
                Storage::disk('public')->delete($oldImagePath);
            }
            $imagePath = $request->image_url;
        }

        $slider->update([
            'headline_text' => $request->headline_text,
            'subheadline_text' => $request->subheadline_text,
            'image_path' => $imagePath,
            'is_active' => $request->has('is_active'),
            'order_position' => $request->order_position ?? 0
        ]);

        return redirect()->route('admin.sliders.index')

            ->with('success', 'Slider berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // Delete image file if it's a local file
        if ($slider->image_path && !str_starts_with($slider->image_path, 'http')) {
            $imagePath = str_replace('storage/', '', $slider->image_path);
            Storage::disk('public')->delete($imagePath);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider berhasil dihapus!');
    }

    /**
     * Toggle slider status
     */
    public function toggleStatus(Slider $slider)
    {
        $slider->update(['is_active' => !$slider->is_active]);
        
        $status = $slider->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.sliders.index')
            ->with('success', "Slider berhasil {$status}!");
    }
}