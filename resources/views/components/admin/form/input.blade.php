@props(['label' => '', 'name' => '', 'type' => 'text', 'value' => '', 'required' => false, 'placeholder' => '', 'help' => ''])

<div class="mb-4">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif
    
    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 sm:text-sm transition-colors px-4 py-3.5 h-12']) }}
    >
    
    @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    
    @if($help && !$errors->has($name))
    <p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
