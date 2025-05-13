<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adventureController extends Controller
{
     public function index()
{
    return view('layanan.adventure.adventure');
}
}
