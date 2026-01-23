@props(['name', 'title' => '', 'size' => 'md'])

@php
$sizes = [
    'sm' => 'max-w-md',
    'md' => 'max-w-lg',
    'lg' => 'max-w-2xl',
    'xl' => 'max-w-4xl',
    'full' => 'max-w-full mx-4',
];
@endphp

<div x-data="{ open: false }" 
     x-on:open-modal.window="if ($event.detail.name === '{{ $name }}') open = true"
     x-on:close-modal.window="if ($event.detail.name === '{{ $name }}') open = false"
     x-show="open"
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">
    <!-- Backdrop -->
    <div x-show="open" 
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
         @click="open = false"></div>

    <!-- Modal -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div x-show="open"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all {{ $sizes[$size] }} w-full">
            
            @if($title)
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
                <button @click="open = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            @endif
            
            <div class="px-6 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
