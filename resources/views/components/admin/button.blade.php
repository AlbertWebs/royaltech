@props(['type' => 'button', 'variant' => 'primary', 'size' => 'md', 'href' => null, 'icon' => null])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
$variants = [
    'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
    'secondary' => 'bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-gray-500',
    'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    'warning' => 'bg-yellow-600 text-white hover:bg-yellow-700 focus:ring-yellow-500',
    'outline' => 'border-2 border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-gray-500',
];
$sizes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg',
];
$classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <i class="{{ $icon }} mr-2"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <i class="{{ $icon }} mr-2"></i>
        @endif
        {{ $slot }}
    </button>
@endif
