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
                <a href="{{url('/')}}/admin/banners" class="text-gray-400 hover:text-gray-500">Banners</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit Banner</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/banners" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Banners
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Edit Banner: {{ $Banner->name ?? $Banner->title }}</h3>
            <p class="text-sm text-gray-500 mt-1">Banner images are used to enhance the layout</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Banner/{{$Banner->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Banner Link Name -->
            <x-admin.form.input 
                name="link_name" 
                label="Banner Link Name" 
                :value="$Banner->link_name"
                placeholder="Enter link name (e.g., Shop Now)"
            />

            <!-- Banner Link -->
            <div>
                @php
                    $Settings = DB::table('_site_settings')->first();
                    $Category = DB::table('categories')->get();
                    $linkOptions = [];
                    foreach($Category as $cat) {
                        $linkOptions[$Settings->url . '/products/' . $cat->slung] = $cat->title . ' - ' . $Settings->url . '/products/' . $cat->slung;
                    }
                @endphp
                <x-admin.form.select 
                    name="link" 
                    label="Choose Where This Link Points To" 
                    :options="$linkOptions"
                    :value="$Banner->link"
                    placeholder="Select a link destination"
                    required
                />
            </div>

            <!-- Banner Title -->
            <x-admin.form.input 
                name="title" 
                label="Banner Title" 
                :value="$Banner->title"
                placeholder="Enter banner title"
            />

            <!-- Banner Content -->
            <x-admin.form.input 
                name="content" 
                label="Banner Content" 
                :value="$Banner->content"
                placeholder="Enter banner content/description"
            />

            <!-- Banner Size (Read-only) -->
            <x-admin.form.input 
                name="size" 
                label="Banner Size" 
                :value="$Banner->size"
                readonly
            />

            <!-- Banner Section (Read-only) -->
            <x-admin.form.input 
                name="section" 
                label="Banner Section" 
                :value="$Banner->section"
                readonly
            />

            <!-- Banner Image -->
            <div x-data="{ preview: '{{url('/')}}/uploads/banners/{{$Banner->image}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Banner Image</label>
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
                    <img :src="preview" alt="Banner Image Preview" class="h-48 w-full object-cover rounded-lg border border-gray-200">
                </div>
                <input type="hidden" name="image_cheat" value="{{$Banner->image}}">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/banners" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
