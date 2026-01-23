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
                <a href="{{url('/')}}/admin/services" class="text-gray-400 hover:text-gray-500">Services</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit {{ $Service->title }}</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/services" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Services
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Edit Service: {{ $Service->title }}</h3>
            <p class="text-sm text-gray-500 mt-1">Update service information</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Service/{{$Service->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Service Title -->
            <x-admin.form.input 
                name="title" 
                label="Service Title" 
                :value="$Service->title"
                placeholder="Enter service title"
                required
            />

            <!-- Meta Description -->
            <x-admin.form.textarea 
                name="meta" 
                label="Meta Description" 
                :value="$Service->content"
                rows="3"
                placeholder="Enter meta description for SEO"
                required
            />

            <!-- Service Content (CKEditor) -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-1">
                    Service Description <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    rows="10"
                    required
                >{{ $Service->content_one }}</textarea>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor');
                    }
                </script>
            </div>

            <!-- Service Image -->
            <div x-data="{ preview: '{{url('/')}}/uploads/services/{{$Service->image}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Service Featured Image (600px x 600px recommended)</label>
                <div class="mt-1 flex items-center">
                    <label for="image_one" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fa fa-upload mr-2"></i> Choose File
                        </span>
                        <input 
                            type="file"
                            name="image_one"
                            id="image_one"
                            accept="image/*"
                            class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                        >
                    </label>
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                </div>
                <div class="mt-2">
                    <img :src="preview" alt="Service Image Preview" class="h-64 w-auto object-cover rounded-lg border border-gray-200">
                </div>
                <input type="hidden" name="image_cheat" value="{{$Service->image}}">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/services" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
