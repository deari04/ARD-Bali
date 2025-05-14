<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutbondController;
use App\Http\Controllers\gatheringController;
use App\Http\Controllers\adventureController;
use App\Http\Controllers\tourController;
use App\Http\Controllers\GalaDinnerController;
use App\Http\Controllers\eventproductionController;
use App\Http\Controllers\miceController;
use App\Http\Controllers\musicController;
use App\Http\Controllers\multimediaController;
use App\Http\Controllers\artismanagementController;
use App\Http\Controllers\showmanagementController;
use App\Http\Controllers\transportasiController;
use App\Http\Controllers\launchingprodukController;

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
        'GalaDinner', 'eventproduction', 'mice',
        'music', 'multimedia', 'artismanagement',
        'showmanagement', 'transportasi', 'tourguide',
        'launchingproduk'
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
Route::get('/tour', [tourController::class, 'index']);
Route::get('/GalaDinner', [GalaDinnerController::class, 'index']);
Route::get('/eventproduction', [eventproductionController::class, 'index']);
Route::get('/mice', [miceController::class, 'index']);
Route::get('/music', [musicController::class, 'index']);
Route::get('/multimedia', [multimediaController::class, 'index']);
Route::get('/artismanagement', [artismanagementController::class, 'index']);
Route::get('/showmanagement', [showmanagementController::class, 'index']);
Route::get('/transportasi', [transportasiController::class, 'index']);
Route::get('/tourguide', [tourguideController::class, 'index']);
Route::get('/launchingproduk', [launchingprodukController::class, 'index']);