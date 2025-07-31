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

    // Ambil semua kategori layanan aktif beserta 1 service aktif (dengan image)
    $serviceCategories = ServiceCategory::select('id', 'name', 'slug', 'description')
        ->with(['services' => function ($query) {
            $query->where('is_active', true)
                  ->select('id', 'category_id', 'image_path')
                  ->with(['images' => function ($q) {
                      $q->select('id', 'service_id', 'image_path');
                  }])
                  ->latest()
                  ->limit(1);
        }])
        ->where('is_active', true)
        ->orderBy('order_position')
        ->get();

    // Pisahkan 6 layanan utama dan sisanya sebagai tambahan
    $mainServiceCategories = $serviceCategories->take(6);
    $additionalServiceCategories = $serviceCategories->take(50);

    return view('home', compact(
        'youtubeLinks',
        'instagramStory',
        'mainServiceCategories',
        'additionalServiceCategories'
    ));
}

}
