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
                <a href="{{url('/')}}/admin/sliders" class="text-gray-400 hover:text-indigo-600">Sliders</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Add New Slider</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center">
            <div class="bg-white/20 rounded-lg p-2 mr-3">
                <i class="fa fa-image text-white text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white">Add New Slider</h3>
                <p class="text-indigo-100 text-sm mt-1">Create a new homepage slider image</p>
            </div>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/add_Slider" enctype="multipart/form-data" class="px-6 py-6" x-data="{ formSubmitting: false }" @submit="formSubmitting = true">
        @csrf
        
        <div class="space-y-6">
            <!-- Slider Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Slider Name <span class="text-gray-500 text-xs font-normal">(Optional)</span>
                </label>
                <input 
                    type="text"
                    name="name"
                    id="name"
                    placeholder="e.g., Summer Sale Banner"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5 h-12"
                >
                <p class="mt-1 text-xs text-gray-500">A descriptive name to identify this slider</p>
            </div>

            <!-- Slider Content -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fa fa-file-text-o mr-2"></i> Slider Content <span class="text-gray-500 text-xs font-normal">(Optional)</span>
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[300px]"
                    rows="10"
                    placeholder="Enter slider content or description..."
                ></textarea>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <i class="fa fa-lightbulb-o mr-1"></i> Use the rich text editor to format your slider content with headings, lists, and links
                </p>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor', {
                            height: 300,
                            toolbar: [
                                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                                { name: 'links', items: ['Link', 'Unlink'] },
                                { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                { name: 'colors', items: ['TextColor', 'BGColor'] },
                                { name: 'tools', items: ['Maximize', 'Source'] }
                            ]
                        });
                    }
                </script>
            </div>

            <!-- Slider Image -->
            <div>
                <div class="flex items-center mb-4 pb-2 border-b border-gray-200">
                    <div class="bg-pink-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-image text-pink-600"></i>
                    </div>
                    <h4 class="text-base font-semibold text-gray-900">Slider Image</h4>
                </div>
                
                <p class="mt-2 mb-4 text-sm text-gray-600 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-indigo-500"></i> 
                    Upload a high-quality image for your homepage slider. Recommended size: 1920x800px or similar banner dimensions.
                </p>
                
                <div x-data="{ preview: '', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Slider Image <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex items-center mb-3">
                        <label for="image" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-indigo-300 rounded-lg shadow-sm text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors">
                                <i class="fa fa-upload mr-2"></i> Choose Image
                            </span>
                            <input 
                                type="file"
                                name="image"
                                id="image"
                                accept="image/*"
                                required
                                class="sr-only"
                                @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                            >
                        </label>
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium truncate max-w-[200px]" x-text="fileName"></span>
                    </div>
                    <div class="mt-4">
                        <div x-show="preview" class="relative">
                            <div class="bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center overflow-hidden" style="min-height: 200px;">
                                <img :src="preview" alt="Slider Preview" class="max-w-full max-h-96 w-auto h-auto object-contain rounded-lg shadow-lg">
                            </div>
                            <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs font-semibold px-2 py-1 rounded shadow-lg">
                                <i class="fa fa-check mr-1"></i> Preview
                            </div>
                        </div>
                        <div x-show="!preview" class="bg-gray-200 rounded-lg border-2 border-dashed border-gray-300 p-8 flex items-center justify-center" style="min-height: 200px;">
                            <div class="text-center">
                                <i class="fa fa-image text-gray-400 text-5xl mb-3"></i>
                                <p class="text-gray-500 text-sm font-medium">No image selected</p>
                                <p class="text-gray-400 text-xs mt-1">Upload an image to see preview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/sliders" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" 
                    :disabled="formSubmitting"
                    class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fa mr-2" :class="formSubmitting ? 'fa-spinner fa-spin' : 'fa-save'"></i> 
                <span x-text="formSubmitting ? 'Adding Slider...' : 'Add Slider'"></span>
            </button>
        </div>
    </form>
</div>

@endsection
