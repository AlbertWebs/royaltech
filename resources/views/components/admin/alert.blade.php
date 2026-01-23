@props(['type' => 'info', 'dismissible' => false])

@php
$types = [
    'success' => 'bg-green-50 border-green-200 text-green-800',
    'error' => 'bg-red-50 border-red-200 text-red-800',
    'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
    'info' => 'bg-blue-50 border-blue-200 text-blue-800',
];
$icons = [
    'success' => 'fa-check-circle',
    'error' => 'fa-exclamation-circle',
    'warning' => 'fa-exclamation-triangle',
    'info' => 'fa-info-circle',
];
$classes = 'border-l-4 p-4 rounded-r-lg ' . $types[$type];
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} x-data="{ show: true }" x-show="show" x-transition>
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <i class="fa {{ $icons[$type] }} text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium">{{ $slot }}</p>
        </div>
        @if($dismissible)
        <div class="ml-auto pl-3">
            <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                <i class="fa fa-times"></i>
            </button>
        </div>
        @endif
    </div>
</div>
