@props(['label' => '', 'name' => '', 'required' => false, 'accept' => '', 'help' => '', 'preview' => false])

<div class="mb-4" x-data="{ preview: null, fileName: '' }">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif
    
    <div class="mt-1 flex items-center">
        <label for="{{ $name }}" class="cursor-pointer">
            <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fa fa-upload mr-2"></i>
                Choose File
            </span>
            <input 
                type="file"
                name="{{ $name }}"
                id="{{ $name }}"
                accept="{{ $accept }}"
                {{ $required ? 'required' : '' }}
                class="sr-only"
                @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0] && '{{ $preview }}') { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                {{ $attributes }}
            >
        </label>
        <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
    </div>
    
    @if($preview)
    <div x-show="preview" class="mt-2">
        <img :src="preview" alt="Preview" class="h-32 w-32 object-cover rounded">
    </div>
    @endif
    
    @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    
    @if($help && !$errors->has($name))
    <p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
