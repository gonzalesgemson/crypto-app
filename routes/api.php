<?php

use App\Http\Controllers\CoinGeckoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CoinGeckoController::class, 'ping']);
Route::get('/coins', [CoinGeckoController::class, 'get']);