<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ImageGalleryController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard WEB CRUD --------------------------------------------------
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard2', function () {
    return Inertia::render('Dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard2');
Route::get('/dashboard3', function () {
    return Inertia::render('Dashboard3');
})->middleware(['auth', 'verified'])->name('dashboard3');

Route::get('/dashboard4', [ ImageGalleryController::class, 'index' ])->middleware(['auth', 'verified'])->name('dashboard4');
Route::get('/dashboard5', [ PDFController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard5');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// EMail -------------------------------------------------------
Route::get('/send-email-pdf', [PDFController::class, 'index']);

// Upload file
Route::get('file-upload', [ FileUploadController::class, 'getFileUploadForm'])->name('get.fileupload');
Route::post('file-upload', [ FileUploadController::class, 'store'])->name('store.file');

// ImageGallery file
// Route::get('image-gallery',[ImageGalleryController::class,'index']);
// Route::post('image-gallery',[ImageGalleryController::class,'upload']);
// Route::delete('image-gallery/{id}',[ImageGalleryController::class,'destory']);

Route::get('image-gallery', [ ImageGalleryController::class, 'index' ]);
Route::post('image-gallery', [ ImageGalleryController::class, 'upload' ]);
Route::delete('image-gallery/{id}', [ ImageGalleryController::class, 'destroy' ]);


require __DIR__.'/auth.php';