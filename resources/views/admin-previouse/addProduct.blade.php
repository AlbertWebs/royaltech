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
                <span class="text-gray-900 font-medium">Add New Product</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/products" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Products
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Add Product</h3>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/add_Product" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Name -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="title" 
                    label="Product Name" 
                    placeholder="Enter product name"
                    required
                />
            </div>

            <!-- Product Price -->
            <div>
                <x-admin.form.input 
                    name="price" 
                    label="Product Price" 
                    type="number"
                    placeholder="0.00"
                    required
                />
            </div>

            <!-- Product Image -->
            <div>
                <x-admin.form.file 
                    name="image_one" 
                    label="Product Main Image (600px x 600px)" 
                    accept="image/*"
                    preview
                    required
                />
            </div>

            <!-- Category -->
            <div>
                @php
                    $categoryOptions = [];
                    foreach($Category as $cat) {
                        $categoryOptions[$cat->id] = $cat->title;
                    }
                @endphp
                <x-admin.form.select 
                    name="category" 
                    label="Choose Category" 
                    :options="$categoryOptions"
                    placeholder="Select a category"
                    required
                />
                <div class="mt-2">
                    <button 
                        type="button"
                        @click="$dispatch('open-modal', { name: 'addCategory' })"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium"
                    >
                        <i class="fa fa-plus mr-1"></i> Add New Category
                    </button>
                </div>
            </div>

            <!-- Brand -->
            <div>
                @php
                    $brandOptions = [];
                    $Brands = DB::table('brands')->get();
                    foreach($Brands as $brand) {
                        $brandOptions[$brand->title] = $brand->title;
                    }
                @endphp
                <x-admin.form.select 
                    name="brand" 
                    label="Choose Brand" 
                    :options="$brandOptions"
                    placeholder="Select a brand"
                    required
                />
            </div>

            <!-- Product Condition -->
            <div>
                <x-admin.form.select 
                    name="condition" 
                    label="Product Condition" 
                    :options="['Ex-UK' => 'Ex-UK', 'New' => 'New']"
                    placeholder="Select condition"
                    required
                />
            </div>

            <!-- Author -->
            <div>
                <x-admin.form.input 
                    name="author" 
                    label="Author Name" 
                    value="{{ Auth::user()->name }}"
                    required
                />
            </div>
        </div>

        <!-- Meta Description -->
        <div class="mt-6">
            <x-admin.form.textarea 
                name="meta" 
                label="Meta Description" 
                rows="3"
                placeholder="Enter meta description for SEO"
                required
            />
        </div>

        <!-- Content (CKEditor) -->
        <div class="mt-6">
            <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-1">
                Product Description <span class="text-red-500">*</span>
            </label>
            <textarea 
                id="article-ckeditor" 
                name="content" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                rows="10"
                required
            ></textarea>
            <script>
                if (typeof CKEDITOR !== 'undefined') {
                    CKEDITOR.replace('article-ckeditor');
                }
            </script>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/products" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Submit
            </x-admin.button>
        </div>
    </form>
</div>

<!-- Add Category Modal -->
<x-admin.modal name="addCategory" title="Add New Category" size="md">
    <form id="categoryAddForm" x-data="{ loading: false, success: false }">
        @csrf
        <x-admin.form.input 
            name="title" 
            label="Category Name" 
            id="CategoryTitle"
            placeholder="Enter category name"
        />
        
        <div x-show="loading" class="mb-4">
            <div class="flex items-center justify-center">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <span class="ml-2 text-sm text-gray-600">Adding category...</span>
            </div>
        </div>
        
        <div x-show="success" class="mb-4">
            <x-admin.alert type="success">Category Added Successfully! Refreshing page...</x-admin.alert>
        </div>
        
        <div class="flex justify-end space-x-3 mt-6">
            <button 
                type="button" 
                @click="$dispatch('close-modal', { name: 'addCategory' })" 
                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </button>
            <button 
                type="submit" 
                @click.prevent="
                    loading = true;
                    fetch('{{url('/')}}/admin/addCategoryAjaxRequest', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({ title: document.getElementById('CategoryTitle').value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        loading = false;
                        if (data.success) {
                            success = true;
                            document.getElementById('categoryAddForm').reset();
                            setTimeout(() => {
                                $dispatch('close-modal', { name: 'addCategory' });
                                location.reload();
                            }, 2000);
                        }
                    });
                "
                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700"
            >
                Submit
            </button>
        </div>
    </form>
</x-admin.modal>

@endsection
