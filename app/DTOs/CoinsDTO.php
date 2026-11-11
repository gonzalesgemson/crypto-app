<?php

namespace App\DTOs;

use ArrayIterator;
use Traversable;
use Countable;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, CoinDTO>
 */

final readonly class CoinsDTO implements Countable, IteratorAggregate
{
    /** @param list<CoinDTO> $coins */
    public function __construct(public readonly array $coins) {}

    public static function fromApi(array $coins): self
    {
        return new self(array_map(fn (array $coin) => CoinDTO::fromAPI($coin), $coins));
    }

    public function count(): int
    {
        return count($this->coins);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->coins);
    }
}