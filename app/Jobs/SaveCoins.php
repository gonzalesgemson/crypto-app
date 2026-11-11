<?php

namespace App\Jobs;

use App\DTOs\CoinsDTO;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\CryptoProvider;
use App\Interfaces\CoinRepositoryInterface;

/**
 * @method static int dispatchSync(array $coins = [], string $currency = 'usd') Runs handle() inline, returns its int result.
 * @method static self dispatch()
 */
class SaveCoins implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected array $coins,
        protected string $currency
    ) { }

    public function handle(CryptoProvider $provider, CoinRepositoryInterface $repository): int
    {
        $coins = $provider->get([
            'coins' => $this->coins,
            'currency' => $this->currency
        ]);

        return $repository->upsertMany(CoinsDTO::fromApi($coins))->count();
    }
}