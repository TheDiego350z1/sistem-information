<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Provider\ProviderController;

Route::prefix("providers")->group(function () {
    Route::get('/', [ProviderController::class, 'index'])
        ->name('providers.index');

    Route::get('/{provider}', [ProviderController::class, 'show'])
        ->name('providers.show');

    Route::post('/', [ProviderController::class, 'store'])
        ->name('providers.store');

    Route::put('/{provider}', [ProviderController::class, 'update'])
        ->name('providers.update');

    Route::delete('/{provider}', [ProviderController::class, 'destroy'])
        ->name('providers.destroy');
});
