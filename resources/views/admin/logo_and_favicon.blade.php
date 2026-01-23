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
                <a href="{{url('/')}}/admin/SiteSettings" class="text-gray-400 hover:text-indigo-600">Site Settings</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Logo & Favicon</span>
            </li>
        </ol>
    </nav>
</div>

@if($SiteSettings)
<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div>
            <h3 class="text-lg font-semibold text-white">Logo & Favicon Settings</h3>
            <p class="text-indigo-100 text-sm mt-1">Manage your site identity media and branding</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/logo-and-favicon-update" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Logo One (Main Logo) -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-image text-indigo-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Main Logo</h3>
                        <p class="text-xs text-gray-500">Primary site logo</p>
                    </div>
                </div>
                <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->logo ?? 'logo.png'}}', fileName: '' }">
                    <div class="mt-1 flex items-center mb-3">
                        <label for="logo" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Main Logo Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="logo_cheat" value="{{$SiteSettings->logo ?? ''}}">
                </div>
            </div>

            <!-- Footer Logo -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-image text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Footer Logo</h3>
                        <p class="text-xs text-gray-500">Logo for footer section</p>
                    </div>
                </div>
                <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->logo_footer ?? 'logo.png'}}', fileName: '' }">
                    <div class="mt-1 flex items-center mb-3">
                        <label for="logo_footer" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Footer Logo Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="logo_footer_cheat" value="{{$SiteSettings->logo_footer ?? ''}}">
                </div>
            </div>

            <!-- Logo Two (Alternate) -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-pink-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-image text-pink-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Alternate Logo</h3>
                        <p class="text-xs text-gray-500">Secondary logo variant</p>
                    </div>
                </div>
                <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->logo_two ?? 'logo.png'}}', fileName: '' }">
                    <div class="mt-1 flex items-center mb-3">
                        <label for="logo_two" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Alternate Logo Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="logo_two_cheat" value="{{$SiteSettings->logo_two ?? ''}}">
                </div>
            </div>

            <!-- Favicon -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-yellow-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-star text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Favicon</h3>
                        <p class="text-xs text-gray-500">Browser tab icon (16x16 or 32x32)</p>
                    </div>
                </div>
                <div x-data="{ preview: '{{url('/')}}/uploads/logo/{{$SiteSettings->favicon ?? 'favicon.png'}}', fileName: '' }">
                    <div class="mt-1 flex items-center mb-3">
                        <label for="favicon" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Favicon Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <p class="mt-2 text-xs text-gray-500">
                        <i class="fa fa-info-circle mr-1"></i> Recommended: 16x16px or 32x32px PNG/ICO format
                    </p>
                    <input type="hidden" name="favicon_cheat" value="{{$SiteSettings->favicon ?? ''}}">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/SiteSettings" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@else
<div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-200 text-center">
    <i class="fa fa-exclamation-triangle text-yellow-500 text-4xl mb-4"></i>
    <h3 class="text-xl font-semibold text-gray-900 mb-2">Settings Not Found</h3>
    <p class="text-gray-600">Site settings could not be loaded. Please contact your administrator.</p>
</div>
@endif

@endsection
