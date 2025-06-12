<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function index()
    {
        return view('gallery');
    }
}
