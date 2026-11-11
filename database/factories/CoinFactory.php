<?php

namespace Database\Factories;

use App\Models\Coin;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoinFactory extends Factory
{
    protected $model = Coin::class;
    
    public function definition(): array
    {
        return [
            'coin_id' => $this->faker->unique()->slug(2),
            'symbol' => $this->faker->unique()->lexify('???'),
            'name' => $this->faker->unique()->words(2, true),
            'image' => $this->faker->imageUrl(),
            'current_price' => $this->faker->randomFloat(8, 0.01, 100000),
            'market_cap' => $this->faker->randomFloat(2, 1000000, 200000000000000000),
            'market_cap_rank' => $this->faker->numberBetween(1, 500),
            'total_volume' => $this->faker->randomFloat(2, 100000, 5000000000000),
            'price_change_percentage_24h' => $this->faker->randomFloat(2, -03, 30)
        ];
    }
}