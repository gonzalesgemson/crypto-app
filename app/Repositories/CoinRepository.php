<?php

namespace App\Repositories;

use App\Models\Coin;
use App\DTOs\CoinDTO;
use App\DTOs\CoinsDTO;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\CoinRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CoinRepository extends BaseRepository implements CoinRepositoryInterface
{
    public function __construct(Coin $model)
    {
        parent::__construct($model);
    }

    public function upsert(CoinDTO $coinDTO): Coin
    {
        return $this->model->newQuery()->updateOrCreate(
            ['coin_id' => $coinDTO->coin_id],
            $coinDTO->toArray()
        );
    }

    public function upsertMany(CoinsDTO $coins): Collection
    {
        return DB::transaction(function () use ($coins) {
            $saved = [];

            foreach ($coins as $coin) {
                $saved[] = $this->upsert($coin);
            }

            return new Collection($saved);
        });
    }

    public function findByCoinId(string $coinId): ?Coin
    {
        return $this->model->newQuery()->where('coin_id', $coinId)->first();
    }
}