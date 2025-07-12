<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hotelController extends Controller
{
     public function index()
{
    return view('hotel');
}
}
