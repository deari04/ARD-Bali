<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all(); // Ambil semua kategori
        return view('service', compact('categories'));
    }
    
    public function show($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->firstOrFail();
        $services = $category->services()->where('is_active', true)->get();

        return view('service_detail', compact('category', 'services'));
    }

}
