<?php

namespace App\Services;

interface CryptoProvider
{
    public function ping(): array;

    public function get(array $options = []): array;
}