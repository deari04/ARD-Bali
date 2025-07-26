<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YoutubeLink;
use App\Models\InstagramStory;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda dengan data YouTube dan Instagram Story.
     */
    public function index()
    {
        // Ambil 2 link YouTube yang aktif dan urut sesuai posisi
        $youtubeLinks = YoutubeLink::where('is_active', 1)
                                   ->orderBy('order_position')
                                   ->take(2)
                                   ->get();

        // Ambil satu Instagram Story terbaru yang aktif
        $instagramStory = InstagramStory::where('is_active', 1)
                                        ->latest()
                                        ->first();

        // Kirim data ke tampilan home
        return view('home', compact('youtubeLinks', 'instagramStory'));
    }
}
