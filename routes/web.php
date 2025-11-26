<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PanduanwisataPostController;
use App\Http\Controllers\UpdatePostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VideoPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route publik, autentikasi, dan khusus user didefinisikan di sini
|--------------------------------------------------------------------------
*/

// == RUTE PUBLIK ==
Route::get('/', [PanduanwisataPostController::class,'index'])->name('index');
Route::get('/tentang', function(){return view('tentang');})->name('tentang');
Route::get('/kontak', function(){return view('kontak');})->name('kontak');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// Blog menggunakan resource controller
Route::resource('/blogs', BlogController::class);

// == RUTE AUTENTIKASI ==
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', function () {
    return view('Auth.registrasi');
})->name('Auth.register');
Route::post('/register', [RegisterController::class, 'register']);

// == RUTE CUSTOMER (HARUS LOGIN DENGAN GUARD 'customer') ==
Route::middleware(['auth:customer'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Keranjang dan pembayaran
    Route::get('/keranjang', [PaymentController::class, 'showCart'])
        ->name('keranjang')
        ->middleware('auth:customer');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])
        ->name('payment.process');

    // Tiket pengguna
    Route::get('/user/ticket/{order:invoice_number}', [PageController::class, 'viewDetailTicket'])
        ->name('view-detail-ticket');
    Route::get('/user/ticket/{order:invoice_number}/download', [PageController::class, 'downloadTicketPDF'])
        ->name('ticket.download');
});

// == RUTE CALLBACK (Webhook dari Midtrans) ==
Route::post('/user/payment/callback', [PaymentController::class, 'handleCallback'])
    ->name('payment.callback');

// == RUTE UTILITAS (Hanya untuk development) ==
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return response()->json([
        'message' => 'Storage link created successfully.',
        'output'  => Artisan::output(),
    ]);
})->name('storage.link');

// Versi ringkas utilitas lokal
Route::get('/run-storage-link', function () {
    if (app()->isLocal()) {
        Artisan::call('storage:link');
        return "storage:link berhasil dijalankan!";
    }
    return "Hanya bisa dijalankan di local environment.";
});
