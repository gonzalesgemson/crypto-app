<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $table = 'coins';

    protected $fillable = [
        'coin_id',
        'symbol',
        'name',
        'image',
        'current_price',
        'market_cap',
        'market_cap_rank',
        'total_volume',
        'high_24h',
        'low_24h',
        'price_change_24h',
        'price_change_percentage_24h',
        'market_cap_change_24h',
        'market_cap_change_percentage_24h',
        'circulating_supply',
        'total_supply',
        'max_supply',
        'ath',
        'ath_change_percentage',
        'ath_date',
        'atl',
        'atl_change_percentage',
        'atl_date'
    ];

    protected function casts(): array
    {
        return [
            'current_price' => 'decimal:8',
            'market_cap' => 'decimal:2',
            'market_cap_rank' => 'integer',
            'total_volume' => 'decimal:2',
            'high_24h' => 'decimal:8',
            'low_24h' => 'decimal:8',
            'price_change_24h' => 'decimal:8',
            'price_change_percentage_24h' => 'decimal:2',
            'market_cap_change_24h' => 'decimal:2',
            'market_cap_change_percentage_24h' => 'decimal:2',
            'circulating_supply' => 'integer',
            'total_supply' => 'integer',
            'max_supply' => 'integer',
            'ath' => 'decimal:8',
            'ath_change_percentage' => 'decimal:2',
            'ath_date' => 'datetime',
            'atl' => 'decimal:8',
            'atl_change_percentage' => 'decimal:2',
            'atl_date' => 'datetime',
        ];
    }

    protected function symbol(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? strtolower($value) : null,
            set: fn (?string $value) => $value ? strtolower($value) : null
        );
    }
}
