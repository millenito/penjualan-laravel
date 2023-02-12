<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::redirect('/', 'auth/login');

Route::middleware(['auth', 'verified'])
    ->group(
        function () {
            Route::get('/home', Home::class)->name('home');

            Route::get('/products', [ProductController::class, 'index'])->name('products');

            Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
            Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
            Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
            Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
            Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
            Route::post('submit-cart', [CartController::class, 'saveCart'])->name('cart.submit');
            Route::get('success', [CartController::class, 'successCart'])->name('cart.success');
        }
    );

include __DIR__.'/auth.php';
include __DIR__.'/my.php';
