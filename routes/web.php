<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutbondController;
use App\Http\Controllers\gatheringController;
use App\Http\Controllers\adventureController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/layanan/{slug}', function ($slug) {
    $allowed = [
        'outbond', 'gathering', 'adventure', 'tour',
        'gala-dinner', 'event-production', 'mice',
        'music-event', 'multimedia', 'artis-management',
        'show-management', 'sewa-transportasi', 'tour-guide',
        'launching-produk'
    ];

    if (in_array($slug, $allowed)) {
        $viewPath = 'layanan.' . $slug . '.' . $slug; // contoh: layanan.adventure.adventure
        if (view()->exists($viewPath)) {
            return view($viewPath);
        }
    }

    abort(404);
})->name('layanan.show');



Route::get('/outbond', [OutbondController::class, 'index']);
Route::get('/gathering', [gatheringController::class, 'index']);
Route::get('/adventure', [adventureController::class, 'index'])->name('adventure');

