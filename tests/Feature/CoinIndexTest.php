<?php

use App\Models\Coin;

it('displays coins on the homepage', function() {
    Coin::factory()->count(3)->create();

    $this->get(route('coins.index'))
        ->assertOk()
        ->assertSee(Coin::first()->name);
});

it('sorts coins by market cap rank', function() {
    Coin::factory()->create(['market_cap_rank' => 3, 'name' => 'Cccoin']);
    Coin::factory()->create(['market_cap_rank' => 1, 'name' => 'Aacoin']);

    $this->get(route('coins.index'))
        ->assertOk()
        ->assertSeeInOrder(['Aacoin', 'Cccoin']);
});

it('shows an empty state when no coins exist', function() {
    $this->get(route('coins.index'))
        ->assertOk()
        ->assertSee('No coins yet');
});
