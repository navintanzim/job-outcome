@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-lg bg-orange-50 px-3 py-2 text-sm font-bold leading-5 text-[var(--coral-dark)] transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-[var(--coral)]'
            : 'inline-flex items-center rounded-lg px-3 py-2 text-sm font-bold leading-5 text-slate-500 transition duration-150 ease-in-out hover:bg-slate-50 hover:text-[var(--ink)] focus:outline-none focus:ring-2 focus:ring-[var(--teal)]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
