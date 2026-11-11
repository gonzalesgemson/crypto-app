<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('coin_id')->unique();
            $table->string('symbol');
            $table->string('name');
            $table->string('image')->nullable();
            $table->decimal('current_price', 20, 8);
            $table->decimal('market_cap', 20, 2);
            $table->integer('market_cap_rank')->nullable();
            $table->decimal('total_volume', 20, 2);
            $table->decimal('high_24h', 20, 8)->nullable();
            $table->decimal('low_24h', 20, 8)->nullable();
            $table->decimal('price_change_24h', 20, 8)->nullable();
            $table->decimal('price_change_percentage_24h', 10, 2)->nullable();
            $table->decimal('market_cap_change_24h', 20, 2)->nullable();
            $table->decimal('market_cap_change_percentage_24h', 10, 2)->nullable();
            $table->decimal('circulating_supply', 30, 8)->nullable();
            $table->decimal('total_supply', 30, 8)->nullable();
            $table->decimal('max_supply', 30, 8)->nullable();
            $table->decimal('ath', 20, 8)->nullable();
            $table->decimal('ath_change_percentage', 10, 2)->nullable();
            $table->timestamp('ath_date')->nullable();
            $table->decimal('atl', 20, 8)->nullable();
            $table->decimal('atl_change_percentage', 10, 2)->nullable();
            $table->timestamp('atl_date')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};
