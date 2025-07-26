<?php

use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\raftingController;
use App\Http\Controllers\atvController;
use App\Http\Controllers\tourguideController;
use App\Http\Controllers\paintballController;
use App\Http\Controllers\watersportController;
use App\Http\Controllers\vwController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\restoController;
use App\Http\Controllers\hotelController;

use App\Http\Controllers\Admin\DashboardGalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AdminYoutubeController;
use App\Http\Controllers\Admin\AdminInstagramStoryController;





// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/galeri', [galleryController::class, 'index'])->name('galeri.index');
Route::post('/galeri', [galleryController::class, 'store'])->name('galeri.store');

Route::get('/location', function () {
    return view('location');
})->name('location');

Route::get('/layanan/{slug}', function ($slug) {
    $allowed = [
        'outbond', 'gathering', 'adventure', 'tour',
        'GalaDinner', 'eventproduction', 'mice',
        'music', 'multimedia', 'artismanagement',
        'showmanagement', 'transportasi', 'tourguide',
        'launchingproduk', 'resto', 'hotel'
    ];

    if (in_array($slug, $allowed)) {
        $viewPath = 'layanan.' . $slug . '.' . $slug; // contoh: layanan.adventure.adventure
        if (view()->exists($viewPath)) {
            return view($viewPath);
        }
    }

    abort(404);
})->name('layanan.show');

Route::get('/layanan/adventure/{slug}', function ($slug) {
    $allowed = [
        'rafting', 'atv', 'paintball', 'watersport', 'vw'
    ];

    if (!in_array($slug, $allowed)) {
        abort(404);
    }

    $viewPath = 'layanan.adventure.' . $slug;

    return view($viewPath);
});


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
Route::get('/rafting', [raftingController::class, 'index']);
Route::get('/atv', [atvController::class, 'index']);
Route::get('/paintball', [paintballController::class, 'index']);
Route::get('/watersport', [watersportController::class, 'index']);
Route::get('/vw', [vwController::class, 'index']);
Route::get('/resto', [restoController::class, 'index']);
Route::get('/outbond', [hotelController::class, 'index']);



// Route login dan logout tidak perlu auth middleware
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});



Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Gallery
    Route::get('/gallery', [DashboardGalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [DashboardGalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/{id}', [DashboardGalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [DashboardGalleryController::class, 'destroy'])->name('gallery.destroy');

    // YouTube Link
    Route::get('/youtube', [\App\Http\Controllers\Admin\AdminYoutubeController::class, 'index'])->name('youtube.index');
    Route::get('/youtube/create', [\App\Http\Controllers\Admin\AdminYoutubeController::class, 'create'])->name('youtube.create');
    Route::post('/youtube', [\App\Http\Controllers\Admin\AdminYoutubeController::class, 'store'])->name('youtube.store');
    Route::get('/youtube/{id}/edit', [\App\Http\Controllers\Admin\AdminYoutubeController::class, 'edit'])->name('youtube.edit');
    Route::put('/youtube/{id}', [\App\Http\Controllers\Admin\AdminYoutubeController::class, 'update'])->name('youtube.update');
    Route::delete('/youtube/{id}', [\App\Http\Controllers\Admin\AdminYoutubeController::class, 'destroy'])->name('youtube.destroy');

    // Instagram Story
    Route::get('/instagram', [\App\Http\Controllers\Admin\AdminInstagramStoryController::class, 'index'])->name('instagram.index');
    Route::get('/instagram/create', [\App\Http\Controllers\Admin\AdminInstagramStoryController::class, 'create'])->name('instagram.create');
    Route::post('/instagram', [\App\Http\Controllers\Admin\AdminInstagramStoryController::class, 'store'])->name('instagram.store');
    Route::get('/instagram/{id}/edit', [\App\Http\Controllers\Admin\AdminInstagramStoryController::class, 'edit'])->name('instagram.edit');
    Route::put('/instagram/{id}', [\App\Http\Controllers\Admin\AdminInstagramStoryController::class, 'update'])->name('instagram.update');
    Route::delete('/instagram/{id}', [\App\Http\Controllers\Admin\AdminInstagramStoryController::class, 'destroy'])->name('instagram.destroy');

    // Location page
    Route::get('/location', [LocationController::class, 'index'])->name('location');
    
});
