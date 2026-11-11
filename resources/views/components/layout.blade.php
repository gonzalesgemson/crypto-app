<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Crypto App') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-50 dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 min-h-screen p-6 lg:p-8">
        <header class="max-w-4xl mx-auto mb-8 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Crypto Watchlist</h1>
            <a href="{{ route('coins.index') }}" class="text-sm text-gray-500 hover:text-gray-900">Coins</a>
        </header>
        <main class="max-w-4xl mx-auto">{{ $slot }}</main>
    </body>
</html>