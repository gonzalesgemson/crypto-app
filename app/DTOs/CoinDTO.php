<?php

namespace App\DTOs;

final readonly class CoinDTO
{
    public function __construct(
        public readonly string $coin_id,
        public readonly string $symbol,
        public readonly string $name,
        public readonly ?string $image,
        public readonly float $current_price,
        public readonly float $market_cap,
        public readonly ?float $market_cap_rank,
        public readonly float $total_volume,
        public readonly ?float $high_24h,
        public readonly ?float $low_24h,
        public readonly ?float $price_change_24h,
        public readonly ?float $price_change_percentage_24h,
        public readonly ?float $market_cap_change_24h,
        public readonly ?float $market_cap_change_percentage_24h,
        public readonly ?float $circulating_supply,
        public readonly ?float $total_supply,
        public readonly ?float $max_supply,
        public readonly ?float $ath,
        public readonly ?string $ath_date,
        public readonly ?float $ath_change_percentage,
        public readonly ?float $atl_change_percentage,
        public readonly ?float $atl,
        public readonly ?string $atl_date
    ) {}

    public static function fromApi(array $coins): self
    {
        return new self(
            coin_id: $coins['id'],
            symbol: $coins['symbol'],
            name: $coins['name'],
            image: $coins['image'] ?? null,
            current_price: $coins['current_price'],
            market_cap: $coins['market_cap'],
            market_cap_rank: $coins['market_cap_rank'] ?? null,
            total_volume: $coins['total_volume'],
            high_24h: $coins['high_24h'] ?? null,
            low_24h: $coins['low_24h'] ?? null,
            price_change_24h: $coins['price_change_24h'] ?? null,
            price_change_percentage_24h: $coins['price_change_percentage_24h'] ?? null,
            market_cap_change_24h: $coins['market_cap_change_24h'] ?? null,
            market_cap_change_percentage_24h: $coins['market_cap_change_percentage_24h'] ?? null,
            circulating_supply: $coins['circulating_supply'] ?? null,
            total_supply: $coins['total_supply'] ?? null,
            max_supply: $coins['max_supply'] ?? null,
            ath: $coins['ath'] ?? null,
            ath_date: $coins['ath_date'] ?? null,
            ath_change_percentage: $coins['ath_change_percentage'] ?? null,
            atl_change_percentage: $coins['atl_change_percentage'] ?? null,
            atl: $coins['atl'] ?? null,
            atl_date: $coins['atl_date'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'coin_id' => $this->coin_id,
            'symbol' => $this->symbol,
            'name' => $this->name,
            'image' => $this->image,
            'current_price' => $this->current_price,
            'market_cap' => $this->market_cap,
            'market_cap_rank' => $this->market_cap_rank,
            'total_volume' => $this->total_volume,
            'high_24h' => $this->high_24h,
            'low_24h' => $this->low_24h,
            'price_change_24h' => $this->price_change_24h,
            'price_change_percentage_24h' => $this->price_change_percentage_24h,
            'market_cap_change_24h' => $this->market_cap_change_24h,
            'market_cap_change_percentage_24h' => $this->market_cap_change_percentage_24h,
            'circulating_supply' => $this->circulating_supply,
            'total_supply' => $this->total_supply,
            'max_supply' => $this->max_supply,
            'ath' => $this->ath,
            'ath_date' => $this->ath_date,
            'ath_change_percentage' => $this->ath_change_percentage,
            'atl' => $this->atl,
            'atl_date' => $this->atl_date,
            'atl_change_percentage' => $this->atl_change_percentage,
        ];
    }
}