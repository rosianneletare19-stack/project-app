<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanduanwisataPostController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PanduanwisataPostController::class,'index'])->name('index');
Route::get('/tentang', function(){return view('tentang');})->name('tentang');
Route::get('/kontak', function(){return view('kontak');})->name('kontak');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


Route::get('/storage-link', function () {
    // Run artisan command
    Artisan::call('storage:link');

    return response()->json([
        'message' => 'Storage link created successfully.',
        'output'  => Artisan::output(),
    ]);
})->name('storage.link');


