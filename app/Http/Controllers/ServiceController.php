<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::where('is_active', true)
                                   ->orderBy('name')
                                   ->get();
        return view('service', compact('categories'));
    }
    
    public function show($slug)
    {
        $category = ServiceCategory::where('slug', $slug)
                                  ->where('is_active', true)
                                  ->firstOrFail();
                                  
        $services = $category->services()
                           ->where('is_active', true)
                           ->orderBy('name')
                           ->get();

        return view('service_detail', compact('category', 'services'));
    }

}