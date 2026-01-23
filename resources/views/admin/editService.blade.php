@extends('admin.master')

@section('content')
<!-- Breadcrumbs -->
<div class="mb-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{url('/')}}/admin/home" class="text-gray-400 hover:text-indigo-600 transition-colors">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <a href="{{url('/')}}/admin/services" class="text-gray-400 hover:text-indigo-600">Services</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit {{ $Service->title }}</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div>
            <h3 class="text-lg font-semibold text-white">Edit Service: {{ $Service->title }}</h3>
            <p class="text-indigo-100 text-sm mt-1">Update service information</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Service/{{$Service->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Service Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Service Title <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text"
                    name="title"
                    id="title"
                    required
                    value="{{ $Service->title }}"
                    placeholder="Enter service title"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5 h-12"
                >
            </div>

            <!-- Meta Description -->
            <div>
                <label for="meta" class="block text-sm font-medium text-gray-700 mb-2">
                    Meta Description <span class="text-red-500">*</span>
                    <span class="text-gray-500 text-xs font-normal ml-2">(For SEO)</span>
                </label>
                <textarea 
                    name="meta"
                    id="meta"
                    rows="3"
                    required
                    placeholder="Enter a brief meta description for search engines"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5"
                >{{ $Service->content }}</textarea>
            </div>

            <!-- Service Content (CKEditor) -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                    Service Description <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[300px]"
                    rows="12"
                    required
                >{{ $Service->content_one }}</textarea>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor', {
                            height: 400,
                            toolbar: [
                                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                                { name: 'links', items: ['Link', 'Unlink'] },
                                { name: 'insert', items: ['Image', 'Table'] },
                                { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                { name: 'colors', items: ['TextColor', 'BGColor'] },
                                { name: 'tools', items: ['Maximize', 'Source'] }
                            ]
                        });
                    }
                </script>
            </div>

            <!-- Service Image -->
            <div x-data="{ preview: '{{url('/')}}/uploads/services/{{$Service->image}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Service Featured Image
                    <span class="text-gray-500 text-xs font-normal ml-2">(600px x 600px recommended)</span>
                </label>
                <div class="mt-1 flex items-center">
                    <label for="image_one" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            <i class="fa fa-upload mr-2"></i> Change Image
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
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                </div>
                <div class="mt-4">
                    <div class="relative inline-block">
                        <img :src="preview" alt="Service Image Preview" class="h-64 w-auto object-cover rounded-lg border-2 border-gray-200 shadow-lg">
                        <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs font-semibold px-2 py-1 rounded shadow-lg">
                            Current Image
                        </div>
                    </div>
                </div>
                <input type="hidden" name="image_cheat" value="{{$Service->image}}">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/services" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Save Changes
            </button>
        </div>
    </form>
</div>

@endsection
