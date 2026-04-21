<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BatikController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    $pelangganId = session('pelanggan_id');
    if ($pelangganId) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/koleksi-batik', [BatikController::class, 'koleksi'])->name('batik.koleksi');
Route::get('/pesan-custom', [CustomOrderController::class, 'create'])->name('custom_order.create');
Route::post('/pesan-custom', [CustomOrderController::class, 'store'])->name('custom_order.store');

Route::resource('pelanggan', PelangganController::class);
Route::resource('batik', BatikController::class);
Route::resource('custom_order', CustomOrderController::class);
Route::resource('pembayaran', PembayaranController::class);

// CART (KERANJANG)
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{id}', [CartController::class, 'add']);

Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::get('/cart/delete/{id}', [CartController::class, 'delete']);

// CHECKOUT & ORDER
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/checkout/detail', [OrderController::class, 'checkoutDetail']);
Route::post('/checkout/process', [OrderController::class, 'processCheckout']);

Route::get('/order/{id}/kirim', [OrderController::class, 'kirim']);
Route::get('/order/{id}/selesai', [OrderController::class, 'selesai']);

Route::get('/batik/{id}', [BatikController::class, 'show'])->name('batik.show');