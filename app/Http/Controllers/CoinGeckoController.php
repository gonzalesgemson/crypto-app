<?php

namespace App\Http\Controllers;

use App\Services\CryptoProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\CoinGeckoRequestValidation;

class CoinGeckoController extends Controller
{
    private CryptoProvider $provider;

    public function __construct(CryptoProvider $provider)
    {
        $this->provider = $provider;
    }

    public function ping()
    {
        return response()->json($this->provider->ping());
    }

    public function get(CoinGeckoRequestValidation $request): JsonResponse
    {
        $data = $request->validated();

        $response = $this->provider->get($data);

        return response()->json($response);
    }
}