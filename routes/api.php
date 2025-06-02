<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')
    ->group(function () {
        // Define your authenticated routes here
        require __DIR__ . '/products.php';
        require __DIR__ . '/providers.php';
    });

require __DIR__ . '/auth.php';
