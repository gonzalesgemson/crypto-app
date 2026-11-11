<x-layout>
    <div class="rounded-lg bg-white dark:bg-[#161615] shadow-sm overflow-hidden">
        @forelse($coins as $coin)
            <div class="flex items-center justify-between px-6 py-4 {{ $loop->first ? '' : 'border-t border-gray-100 dark:border-gray-800' }}">
                <div class="flex items-center gap-3">
                    <span class="text-gray-400 w-6 text-right">{{ $coin->market_cap_rank ?? '-' }}</span>
                    <div>
                        <p class="font-medium">{{ $coin->name }}</p>
                        <p class="text-xs text-gray-500">{{ strtoupper($coin->symbol) }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-medium">${{ $coin->current_price }}</p>
                    <p class="text-xs {{ $coin->price_change_percentage_24h >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $coin->price_change_percentage_24h }}%
                    </p>
                </div>
            </div>
        @empty
            <p class="px-6 py-10 text-center text-gray-500">No coins yet. Run <code>php artisan coins:sync</code>.</p>
        @endforelse
    </div>
</x-layout>