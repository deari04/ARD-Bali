<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YoutubeLink;
use App\Models\InstagramStory;
use App\Models\ServiceCategory;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 2 link YouTube yang aktif
        $youtubeLinks = YoutubeLink::where('is_active', 1)
                                   ->orderBy('order_position')
                                   ->take(2)
                                   ->get();

        // Ambil 1 Instagram Story terbaru yang aktif
        $instagramStory = InstagramStory::where('is_active', 1)
                                        ->latest()
                                        ->first();

        // Ambil kategori layanan aktif + 1 service aktif (hanya image) dengan kolom spesifik
        $serviceCategories = ServiceCategory::select('id', 'name', 'description')
            ->with(['services' => function ($query) {
                $query->where('is_active', true)
                      ->select('id', 'category_id', 'image_path')
                      ->latest()
                      ->limit(6);
            }])
            ->where('is_active', true)
            ->orderBy('order_position')
            ->get();

        return view('home', compact('youtubeLinks', 'instagramStory', 'serviceCategories'));
    }
}
