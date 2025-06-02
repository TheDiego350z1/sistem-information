<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Product\ProductController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/{product}', [ProductController::class, 'show'])
        ->name('products.show');

    Route::post('/', [ProductController::class, 'store'])
        ->name('products.store');

    Route::put('/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});
