<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use InvalidArgumentException;
use App\Jobs\SaveCoins;

#[Signature('coins:sync 
    {--coins=* : Coins to sync (defaults to all configured allowed_coins)}
    {--currency= : Currency to use for coin prices (defaults to configured default_currency)}'
)]
#[Description('Fetch coins from CoinGecko and save them to the database')]
class SaveCoinsCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $requested = $this->option('coins') ?: config('coingecko.allowed_coins');
        $currency = $this->option('currency') ?: config('coingecko.default_currency');

        $allowed = config('coingecko.allowed_coins');
        $unknown = array_diff($requested ?: $allowed, $allowed);

        if ($unknown) {
            $this->error("Unknown coins: " . implode(', ', $unknown));
            return self::FAILURE;
        }

        try {
            $saved = SaveCoins::dispatchSync($requested, $currency);
        } catch (InvalidArgumentException $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        }
        

        $this->info("Saved {$saved} coins.");

        return self::SUCCESS;

    }
}
