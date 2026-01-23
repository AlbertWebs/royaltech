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
                <span class="text-gray-900 font-medium">Logo & Favicon</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/home" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> Dashboard
                </a>
            </li>
        </ol>
    </nav>
</div>

@if($SiteSettings)
<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Logo & Favicon Settings</h3>
            <p class="text-sm text-gray-500 mt-1">Manage your site identity media</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/logo-and-favicon-update" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Logo One -->
            <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->logo}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Logo One (Main Logo)</label>
                <div class="mt-1 flex items-center">
                    <label for="logo" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fa fa-upload mr-2"></i> Choose File
                        </span>
                        <input 
                            type="file"
                            name="logo"
                            id="logo"
                            accept="image/*"
                            class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                        >
                    </label>
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                </div>
                <div class="mt-2">
                    <img :src="preview" alt="Logo One Preview" class="h-32 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-2">
                </div>
                <input type="hidden" name="logo_cheat" value="{{$SiteSettings->logo}}">
            </div>

            <!-- Footer Logo -->
            <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->logo_footer}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Footer Logo</label>
                <div class="mt-1 flex items-center">
                    <label for="logo_footer" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fa fa-upload mr-2"></i> Choose File
                        </span>
                        <input 
                            type="file"
                            name="logo_footer"
                            id="logo_footer"
                            accept="image/*"
                            class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                        >
                    </label>
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                </div>
                <div class="mt-2">
                    <img :src="preview" alt="Footer Logo Preview" class="h-32 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-2">
                </div>
                <input type="hidden" name="logo_footer_cheat" value="{{$SiteSettings->logo_footer}}">
            </div>

            <!-- Logo Two -->
            <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->logo_two}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Logo Two (Alternate)</label>
                <div class="mt-1 flex items-center">
                    <label for="logo_two" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fa fa-upload mr-2"></i> Choose File
                        </span>
                        <input 
                            type="file"
                            name="logo_two"
                            id="logo_two"
                            accept="image/*"
                            class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                        >
                    </label>
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                </div>
                <div class="mt-2">
                    <img :src="preview" alt="Logo Two Preview" class="h-32 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50 p-2">
                </div>
                <input type="hidden" name="logo_two_cheat" value="{{$SiteSettings->logo_two}}">
            </div>

            <!-- Favicon -->
            <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->favicon}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Favicon (16x16 or 32x32 recommended)</label>
                <div class="mt-1 flex items-center">
                    <label for="favicon" class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fa fa-upload mr-2"></i> Choose File
                        </span>
                        <input 
                            type="file"
                            name="favicon"
                            id="favicon"
                            accept="image/*"
                            class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                        >
                    </label>
                    <span x-show="fileName" class="ml-3 text-sm text-gray-600" x-text="fileName"></span>
                </div>
                <div class="mt-2">
                    <img :src="preview" alt="Favicon Preview" class="h-16 w-16 object-contain rounded-lg border border-gray-200 bg-gray-50 p-2">
                </div>
                <input type="hidden" name="favicon_cheat" value="{{$SiteSettings->favicon}}">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/home" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>
@endif

@endsection
