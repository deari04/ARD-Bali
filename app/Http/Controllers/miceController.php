<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miceController extends Controller
{
    public function index()
{
    return view('mice');
}
}
