@extends('admin.master')

@section('content')
<!-- Breadcrumbs -->
<div class="mb-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{url('/')}}/admin/home" class="text-gray-400 hover:text-gray-500">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <a href="{{url('/')}}/admin/sliders" class="text-gray-400 hover:text-gray-500">Sliders</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit Slider</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/sliders" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Sliders
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Edit Slider</h3>
            <p class="text-sm text-gray-500 mt-1">Homepage sliders and the hero images sliding on the landing page</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Slider/{{$Slider->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Slider Text Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-admin.form.input 
                    name="text1" 
                    label="Slider Text 1" 
                    :value="$Slider->text1"
                    placeholder="Enter text 1"
                />
                <x-admin.form.input 
                    name="text2" 
                    label="Slider Text 2" 
                    :value="$Slider->text2"
                    placeholder="Enter text 2"
                />
                <x-admin.form.input 
                    name="text3" 
                    label="Slider Text 3" 
                    :value="$Slider->text3"
                    placeholder="Enter text 3"
                />
                <x-admin.form.input 
                    name="text4" 
                    label="Slider Text 4" 
                    :value="$Slider->text4"
                    placeholder="Enter text 4"
                />
                <x-admin.form.input 
                    name="text5" 
                    label="Slider Text 5" 
                    :value="$Slider->text5"
                    placeholder="Enter text 5"
                />
                <x-admin.form.input 
                    name="action_name" 
                    label="Action Name" 
                    :value="$Slider->action_name"
                    placeholder="Enter action name (e.g., Shop Now)"
                />
            </div>

            <!-- Action URL -->
            <x-admin.form.input 
                name="action" 
                label="Action URL" 
                type="url"
                :value="$Slider->action"
                placeholder="https://example.com"
            />

            <!-- Slider Type -->
            <x-admin.form.select 
                name="type" 
                label="Slider Type" 
                :options="[
                    '1' => '1 - With Text 5 Dropping Off',
                    '2' => '2 - With word by word Dropping',
                    '3' => '3 - With Words With background'
                ]"
                :value="$Slider->type"
                placeholder="Select slider type"
                required
            />

            <!-- Slider Images -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Main Image -->
                <div x-data="{ preview: '{{url('/')}}/uploads/slider/{{$Slider->image}}', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slider Main Image</label>
                    <div class="mt-1 flex items-center">
                        <label for="image" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fa fa-upload mr-2"></i> Choose File
                            </span>
                            <input 
                                type="file"
                                name="image"
                                id="image"
                                accept="image/*"
                                class="sr-only"
                                @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                            >
                        </label>
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                    </div>
                    <div class="mt-2">
                        <img :src="preview" alt="Slider Image Preview" class="h-48 w-full object-cover rounded-lg border border-gray-200">
                    </div>
                    <input type="hidden" name="image_cheat" value="{{$Slider->image}}">
                </div>

                <!-- Thumbnail Image -->
                <div x-data="{ preview: '{{url('/')}}/uploads/slider/{{$Slider->thumbnail}}', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slider Thumbnail</label>
                    <div class="mt-1 flex items-center">
                        <label for="thumbnail" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fa fa-upload mr-2"></i> Choose File
                            </span>
                            <input 
                                type="file"
                                name="thumbnail"
                                id="thumbnail"
                                accept="image/*"
                                class="sr-only"
                                @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                            >
                        </label>
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                    </div>
                    <div class="mt-2">
                        <img :src="preview" alt="Thumbnail Preview" class="h-48 w-full object-cover rounded-lg border border-gray-200">
                    </div>
                    <input type="hidden" name="thumbnail_cheat" value="{{$Slider->thumbnail}}">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/sliders" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
