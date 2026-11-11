<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;

Route::name('coins.')->group(function() {
    Route::get('/', [CoinController::class, 'index'])->name('index');
});
