<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirdController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

// Controller untuk Pengguna/Pelanggan
use App\Http\Controllers\OrderController; 

// Controller untuk Halaman Admin (kita beri alias agar tidak bentrok)
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == RUTE PUBLIK ==
Route::get('/', [BirdController::class, 'showHome'])->name('home');
Route::get('/shop', [BirdController::class, 'showShop'])->name('shop');
Route::get('/shop/{slug}', [BirdController::class, 'show'])->name('shop.detail');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');


// == RUTE YANG HARUS LOGIN DULU ==
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'show'])->name('checkout.show');
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/invoice/{order}', [OrderController::class, 'showInvoice'])->name('invoice.show');
    Route::get('/order/{order}/confirm', [OrderController::class, 'showConfirmationPage'])->name('payment.confirmation.show');
    Route::post('/payment-confirmation/{order}', [OrderController::class, 'storeConfirmation'])->name('payment.confirmation.store');
});


// == RUTE ADMIN ==
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update.status');
    Route::get('/orders/{order}/invoice', [AdminOrderController::class, 'showInvoice'])->name('admin.orders.invoice');
});

// Rute BARU untuk konfirmasi penerimaan pesanan oleh pelanggan
Route::post('/order/{order}/received', [OrderController::class, 'receiveOrder'])->name('order.receive');

// == RUTE AUTENTIKASI ==
require __DIR__.'/auth.php';