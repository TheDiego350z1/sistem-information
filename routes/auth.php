<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
});
