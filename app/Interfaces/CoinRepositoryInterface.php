<?php

namespace App\Interfaces;

use App\DTOs\CoinDTO;
use App\DTOs\CoinsDTO;
use App\Models\Coin;
use Illuminate\Database\Eloquent\Collection;

interface CoinRepositoryInterface extends BaseRepositoryInterface
{
    public function upsert(CoinDTO $coinDTO): Coin;
    public function upsertMany(CoinsDTO $coinDTOs): Collection;
    public function findByCoinId(string $coinId): ?Coin;
}