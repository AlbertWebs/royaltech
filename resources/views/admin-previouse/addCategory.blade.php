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
                <span class="text-gray-900 font-medium">Add New Category</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/categories" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Categories
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Add New Category</h3>
            <p class="text-sm text-gray-500 mt-1">Categories are used in both blogs and general content classification</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/add_Category" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Category Title -->
            <x-admin.form.input 
                name="title" 
                label="Enter Category Title" 
                placeholder="Enter category name"
            />

            <!-- Category Content -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-1">
                    Category Description
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    rows="10"
                    placeholder="Enter category description"
                ></textarea>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor');
                    }
                </script>
            </div>

            <!-- Category Image -->
            <x-admin.form.file 
                name="image" 
                label="Add Category Featured Image" 
                accept="image/*"
                preview
            />
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/categories" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Add Category
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
