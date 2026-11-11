<?php

return [
    'base_url' => env('API_COIN_GECKO_BASE_URL', 'https://api.coingecko.com/api/v3'),
    'api_key' => env('API_COIN_GECKO_API_KEY', null),

    'default_currency' => 'usd',

    'allowed_coins' => [
        'bitcoin',
        'ethereum',
        'litecoin',
        'ripple',
        'cardano',
        'polkadot',
        'chainlink',
        'stellar',
        'dogecoin',
        'vechain',
    ],

    'allowed_currencies' => [
        'usd',
        'php',
        'eur',
        'jpy'    
    ]
];