<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;

Route::get('/', [MenuController::class, 'index']);
Route::get('/category/{category}', [MenuController::class, 'category']);
Route::post('/add-to-cart', [MenuController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [MenuController::class, 'viewCart']);
Route::post('/cart/remove', [MenuController::class, 'removeFromCart']);
Route::get('/checkout', [MenuController::class, 'checkout']);
Route::post('/checkout', [MenuController::class, 'processCheckout']);
Route::get('/thankyou_kasir', [MenuController::class, 'thankyouKasir'])->name('thankyou.kasir');
Route::get('/thankyou_qris', [MenuController::class, 'thankyouQris'])->name('thankyou.qris');
Route::post('/cart/increase', [MenuController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease', [MenuController::class, 'decreaseQuantity'])->name('cart.decrease');


// Route::get('/thankyou/kasir', function () {
//     return view('thankyou_kasir');
// })->name('thankyou.kasir');

// Route::get('/thankyou/qris', function () {
//     return view('thankyou_qris');
// })->name('thankyou.qris');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/orders/{id}/complete', [AdminController::class, 'markAsComplete'])->name('admin.orders.complete');


Route::get('/clear-cart', function () {
    session()->forget('cart');
    return redirect('/')->with('success', 'Cart cleared.');
});

