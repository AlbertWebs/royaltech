@props(['label' => '', 'name' => '', 'options' => [], 'value' => '', 'required' => false, 'placeholder' => 'Select an option', 'help' => ''])

<div class="mb-4">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif
    
    <select 
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm']) }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
            {{ $optionLabel }}
        </option>
        @endforeach
    </select>
    
    @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    
    @if($help && !$errors->has($name))
    <p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
