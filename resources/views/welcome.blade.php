<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'JobOutcome') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen overflow-hidden bg-[var(--paper)]">
            <header class="mx-auto flex max-w-7xl items-center justify-between px-5 py-6 sm:px-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[var(--coral)] text-sm font-bold text-white shadow-sm">JO</span>
                    <span class="font-display text-lg font-bold tracking-tight text-[var(--ink)]">JobOutcome</span>
                </a>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-2 text-sm font-bold">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="ui-button">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 text-slate-600 transition hover:bg-white hover:text-[var(--ink)]">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ui-button">Get started</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="mx-auto grid max-w-7xl items-center gap-12 px-5 pb-16 pt-10 sm:px-8 sm:pt-20 lg:grid-cols-[1.05fr_0.95fr] lg:pb-24">
                <section class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-[var(--teal)]">A better job search record</p>
                    <h1 class="mt-5 text-5xl font-bold leading-[1.03] tracking-tight text-[var(--ink)] sm:text-7xl">See what happens after you apply.</h1>
                    <p class="mt-6 max-w-xl text-base leading-7 text-[var(--muted)] sm:text-lg">
                        JobOutcome helps you keep track of job postings, application updates, and the patterns hidden between them.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="ui-button">Open your workspace</a>
                        @else
                            <a href="{{ route('register') }}" class="ui-button">Start tracking</a>
                            <a href="{{ route('login') }}" class="ui-button-secondary">Sign in</a>
                        @endauth
                    </div>
                </section>

                <section class="relative">
                    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-[var(--sun)]/60 blur-3xl"></div>
                    <div class="relative rounded-3xl bg-[var(--ink)] p-5 shadow-2xl sm:p-7">
                        <div class="flex items-center justify-between border-b border-white/10 pb-5">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-orange-200">Application pulse</p>
                                <p class="mt-1 text-sm text-slate-300">Your search, in context</p>
                            </div>
                            <span class="rounded-full bg-teal-300/15 px-3 py-1 text-xs font-bold text-teal-200">Live record</span>
                        </div>
                        <div class="grid grid-cols-3 gap-3 py-6">
                            <div class="rounded-2xl bg-white/10 p-4"><p class="text-2xl font-bold text-white">12</p><p class="mt-1 text-xs text-slate-400">Tracked</p></div>
                            <div class="rounded-2xl bg-white/10 p-4"><p class="text-2xl font-bold text-white">04</p><p class="mt-1 text-xs text-slate-400">In motion</p></div>
                            <div class="rounded-2xl bg-white/10 p-4"><p class="text-2xl font-bold text-white">03</p><p class="mt-1 text-xs text-slate-400">Outcomes</p></div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between rounded-2xl bg-white p-4"><div><p class="font-bold text-[var(--ink)]">Product Designer</p><p class="mt-1 text-xs text-[var(--muted)]">Northstar Labs</p></div><span class="ui-badge bg-orange-100 text-orange-800">Interview</span></div>
                            <div class="flex items-center justify-between rounded-2xl bg-white/10 p-4"><div><p class="font-bold text-white">Frontend Engineer</p><p class="mt-1 text-xs text-slate-400">Orbital Systems</p></div><span class="ui-badge bg-teal-300/15 text-teal-200">Applied</span></div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
