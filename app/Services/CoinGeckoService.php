<?php

namespace App\Services;

use App\DTOs\CoinDTO;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class CoinGeckoService implements CryptoProvider
{
    protected Client $client;

    public function __construct(
        protected string $apiKey,
        protected string $baseUrl
    ) {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'x-cg-demo-api-key' => $this->apiKey,
            ],
        ]);
    }
        

    public function ping(): array
    {
        $response = $this->client->get('/ping');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function get(array $options = []): array
    {
        $url = sprintf('%s%s', $this->baseUrl, '/coins/markets');

        try {
            $response = $this->client->get($url, [
                'query' => [
                    'vs_currency' => $options['currency'] ?? 'usd',
                    'ids' => implode(',', $options['coins'] ?? []),
                ],
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new InvalidArgumentException('Error fetching data from CoinGecko API: ' . $e->getMessage());
        }
    }

    public function save(array $coins): Collection
    {
        $coinDTOS = [];

        foreach ($coins as $coin) {
            $coinDTOS[] = CoinDTO::fromApi($coin);
        }

        return collect($coinDTOS);
    }
}