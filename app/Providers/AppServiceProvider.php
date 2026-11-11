<?php

namespace App\Providers;

use App\Services\CoinGeckoService;
use App\Services\CryptoProvider;
use App\Repositories\CoinRepository;
use App\Interfaces\CoinRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\CoinGeckoController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CryptoProvider::class, function ($app) {
            return new CoinGeckoService(
                config('coingecko.api_key'),
                config('coingecko.base_url')
            );
        });
        
        $this->app->bind(CoinRepositoryInterface::class, CoinRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
