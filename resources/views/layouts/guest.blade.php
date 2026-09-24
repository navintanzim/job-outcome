<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex min-h-screen flex-col items-center justify-center bg-[var(--paper)] px-4 py-10 sm:py-16">
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[var(--coral)] text-sm font-bold text-white shadow-md">JO</span>
                    <span class="font-display text-2xl font-bold tracking-tight text-[var(--ink)]">JobOutcome</span>
                </a>
                <p class="mt-3 text-sm text-[var(--muted)]">A clearer record of where your applications go.</p>
            </div>

            <div class="w-full max-w-md overflow-hidden rounded-2xl border border-[var(--line)] bg-white px-6 py-7 shadow-[0_16px_40px_rgba(23,33,43,0.08)] sm:px-8">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
