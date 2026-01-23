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
                <span class="text-gray-900 font-medium">Add New Testimonial</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/testimonials" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Testimonials
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Add New Testimonial</h3>
            <p class="text-sm text-gray-500 mt-1">Create client testimonials</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/add_Testimonial" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Client Name -->
            <x-admin.form.input 
                name="name" 
                label="Client Name" 
                placeholder="Enter client name"
                required
            />

            <!-- Company -->
            <x-admin.form.input 
                name="company" 
                label="Company" 
                placeholder="Enter company name"
                required
            />

            <!-- Position -->
            <x-admin.form.input 
                name="position" 
                label="Position" 
                placeholder="Enter position/title"
                required
            />

            <!-- Rating -->
            <x-admin.form.input 
                name="rating" 
                label="Rating (1-5)" 
                type="number"
                min="1"
                max="5"
                placeholder="5"
                required
            />

            <!-- Client Image -->
            <div class="md:col-span-2">
                <x-admin.form.file 
                    name="image" 
                    label="Client Image" 
                    accept="image/*"
                    preview
                    required
                />
            </div>
        </div>

        <!-- Content -->
        <div class="mt-6">
            <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-1">
                Testimonial Content <span class="text-red-500">*</span>
            </label>
            <textarea 
                id="article-ckeditor" 
                name="content" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                rows="8"
                placeholder="Enter testimonial content"
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
            <a href="{{url('/')}}/admin/testimonials" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Add Testimonial
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
