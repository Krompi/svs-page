@props([
    'variant' => 'primary', // primary, accent, black
    'href' => null,
])

@php
    $baseClasses = 'px-6 py-3 rounded-lg font-medium inline-block transition-colors';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-opacity-90',
        'accent' => 'bg-accent text-gray-800 hover:bg-opacity-90',
        'black' => 'bg-black text-white hover:bg-gray-800',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
