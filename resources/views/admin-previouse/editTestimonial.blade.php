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
                <a href="{{url('/')}}/admin/testimonials" class="text-gray-400 hover:text-gray-500">Testimonials</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit Testimonial</span>
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
            <h3 class="text-lg font-semibold text-gray-900">Edit Testimonial</h3>
            <p class="text-sm text-gray-500 mt-1">Update client testimonial</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Testimonial/{{$Testimonial->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Client Name -->
            <x-admin.form.input 
                name="name" 
                label="Client Name" 
                :value="$Testimonial->name"
                placeholder="Enter client name"
                required
            />

            <!-- Company -->
            <x-admin.form.input 
                name="company" 
                label="Company" 
                :value="$Testimonial->company"
                placeholder="Enter company name"
                required
            />

            <!-- Position -->
            <x-admin.form.input 
                name="position" 
                label="Position" 
                :value="$Testimonial->position"
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
                :value="$Testimonial->rating"
                placeholder="5"
                required
            />

            <!-- Client Image -->
            <div class="md:col-span-2" x-data="{ preview: '{{url('/')}}/uploads/testimonials/{{$Testimonial->image}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Client Image</label>
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
                    <img :src="preview" alt="Client Image Preview" class="h-32 w-32 rounded-full object-cover border-2 border-gray-200">
                </div>
                <input type="hidden" name="image_cheat" value="{{$Testimonial->image}}">
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
                required
            >{{ $Testimonial->content }}</textarea>
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
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
