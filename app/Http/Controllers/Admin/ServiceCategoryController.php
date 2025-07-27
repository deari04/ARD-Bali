<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.service_categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->firstOrFail();
        $services = $category->services()->where('is_active', true)->get();
        return view('service_detail', compact('category', 'services'));
    }

    public function create()
    {
        return view('admin.service_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'icon_class' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'icon_class']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('service_categories', 'public');
        }

        ServiceCategory::create($data);

        return redirect()->route('admin.service-categories.index')->with('success', 'Kategori layanan berhasil ditambahkan.');
    }

    public function edit(ServiceCategory $service_category)
    {
        return view('admin.service_categories.edit', compact('service_category'));
    }

    public function update(Request $request, ServiceCategory $service_category)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'icon_class' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'icon_class']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image_path')) {
            // Hapus gambar lama
            if ($service_category->image_path) {
                Storage::disk('public')->delete($service_category->image_path);
            }

            $data['image_path'] = $request->file('image_path')->store('service_categories', 'public');
        }

        $service_category->update($data);

        return redirect()->route('admin.service-categories.index')->with('success', 'Kategori layanan berhasil diperbarui.');
    }

    public function destroy(ServiceCategory $service_category)
    {
        if ($service_category->image_path) {
            Storage::disk('public')->delete($service_category->image_path);
        }

        $service_category->delete();

        return redirect()->route('admin.service-categories.index')->with('success', 'Kategori layanan berhasil dihapus.');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

}
