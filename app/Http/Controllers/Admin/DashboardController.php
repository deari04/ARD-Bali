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
        
        // Hapus ->get() setelah paginate()
        $serviceList = Service::orderBy('id', 'asc')
                        ->paginate(10);

        return view('admin.dashboard', compact(
            'totalServiceAktif',
            'totalGaleri',
            'totalLokasi',
            'totalKategori',
            'serviceList'
        ));
    }
}