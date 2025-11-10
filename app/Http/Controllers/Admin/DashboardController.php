<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\ServiceCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServiceAktif = Service::where('status', 'aktif')->count();
        $totalGaleri = Gallery::count();
        $totalLokasi = Location::count();
        $totalKategori = ServiceCategory::count();
        
        $servicePopuler = Service::where('status', 'aktif')
                                ->orderBy('view_count', 'desc')
                                ->take(5)
                                ->get();
        
        return view('admin.dashboard', compact(
            'totalServiceAktif',
            'totalGaleri',
            'totalLokasi',
            'totalKategori',
            'servicePopuler'
        ));
    }
}