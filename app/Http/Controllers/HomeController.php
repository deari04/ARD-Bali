<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YoutubeLink;

class HomeController extends Controller
{
    public function index()
    {
        $youtubeLinks = YoutubeLink::where('is_active', 1)
                                ->orderBy('order_position')
                                ->take(2)
                                ->get();

        return view('home', compact('youtubeLinks'));
    }

}
