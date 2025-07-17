<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = Gallery::all();
        return view('admin.gallery.index', compact('galleryItems'));

    }

    // ...tambahkan store, update, destroy jika pakai resource
}
