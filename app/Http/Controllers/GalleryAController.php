<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryAController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
       return view('admin.gallery', compact('galleries'));
    }
}
