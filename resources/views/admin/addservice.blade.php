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
                <span class="text-gray-900 font-medium">Add Service</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div>
            <h3 class="text-lg font-semibold text-white">Add New Service</h3>
            <p class="text-indigo-100 text-sm mt-1">Create a new service offering for your website</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/add_service" enctype="multipart/form-data" class="px-6 py-6">
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
                    placeholder="Enter service title"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5 h-12"
                >
                <p class="mt-1 text-sm text-gray-500">This will be displayed as the main heading for your service</p>
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
                    placeholder="Enter a brief meta description for search engines (150-160 characters recommended)"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5"
                ></textarea>
                <p class="mt-1 text-sm text-gray-500">This description appears in search engine results</p>
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
                    placeholder="Enter detailed service description"
                    required
                ></textarea>
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fa fa-info-circle mr-1"></i> Use the editor above to format your service description with rich text formatting.
                </p>
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
            <div x-data="{ preview: null, fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Service Featured Image <span class="text-red-500">*</span>
                    <span class="text-gray-500 text-xs font-normal ml-2">(600px x 600px recommended)</span>
                </label>
                <div class="mt-1 flex items-center">
                    <label for="image_one" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            <i class="fa fa-upload mr-2"></i> Choose Image
                        </span>
                        <input 
                            type="file"
                            name="image_one"
                            id="image_one"
                            accept="image/*"
                            required
                            class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                        >
                    </label>
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                </div>
                <div x-show="preview" class="mt-4">
                    <div class="relative inline-block">
                        <img :src="preview" alt="Service Image Preview" class="h-64 w-auto object-cover rounded-lg border-2 border-gray-200 shadow-lg">
                        <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs font-semibold px-2 py-1 rounded shadow-lg">
                            Preview
                        </div>
                    </div>
                </div>
                <div x-show="!preview" class="mt-4">
                    <div class="h-64 w-full rounded-lg border-2 border-dashed border-gray-300 bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fa fa-image text-gray-400 text-5xl mb-3"></i>
                            <p class="text-sm text-gray-500 font-medium">No image selected</p>
                            <p class="text-xs text-gray-400 mt-1">Upload an image to see preview</p>
                        </div>
                    </div>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fa fa-info-circle mr-1"></i> Recommended size: 600x600px. Supported formats: JPG, PNG, GIF
                </p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/services" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Add Service
            </button>
        </div>
    </form>
</div>

@endsection
