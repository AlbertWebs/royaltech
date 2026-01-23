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
                <a href="{{url('/')}}/admin/categories" class="text-gray-400 hover:text-indigo-600">Categories</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit {{ $Category->title }}</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div>
            <h3 class="text-lg font-semibold text-white">Edit Category: {{ $Category->title }}</h3>
            <p class="text-indigo-100 text-sm mt-1">Update category information</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Category/{{$Category->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Category Title -->
            <x-admin.form.input 
                name="title" 
                label="Category Title" 
                :value="$Category->title"
                placeholder="Enter category name"
                required
            />

            <!-- Category Content -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                    Category Description
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[200px]"
                    rows="10"
                >{{ $Category->content }}</textarea>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor');
                    }
                </script>
            </div>

            <!-- Category Image -->
            <div x-data="{ preview: '{{url('/')}}/uploads/categories/{{$Category->image}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Category Featured Image
                </label>
                <div class="mt-1 flex items-center">
                    <label for="image" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                <div class="mt-4">
                    <img :src="preview" alt="Category Image Preview" class="h-64 w-auto object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                </div>
                <input type="hidden" name="image_cheat" value="{{$Category->image}}">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/categories" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Save Changes
            </button>
        </div>
    </form>
</div>

@endsection
