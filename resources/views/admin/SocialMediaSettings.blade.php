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
                <span class="text-gray-900 font-medium">Social Media Settings</span>
            </li>
        </ol>
    </nav>
</div>

@if($SiteSettings && count($SiteSettings) > 0)
@php $Setting = $SiteSettings->first(); @endphp
<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200" x-data="{ 
    loading: false
}">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 px-6 py-6 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <i class="fa fa-share-alt mr-3"></i> Social Media Settings
                </h2>
                <p class="text-indigo-100 mt-1 text-sm">Manage your social media links and profiles</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-indigo-500/30 backdrop-blur-sm rounded-xl px-4 py-2 border border-indigo-400/30">
                    <div class="text-xs text-indigo-100 uppercase tracking-wide">Connected Platforms</div>
                    <div class="text-sm text-white font-medium">
                        @php
                            $count = 0;
                            if(!empty($Setting->facebook)) $count++;
                            if(!empty($Setting->twitter)) $count++;
                            if(!empty($Setting->instagram)) $count++;
                            if(!empty($Setting->linkedin)) $count++;
                            if(!empty($Setting->youtube)) $count++;
                            if(!empty($Setting->google)) $count++;
                        @endphp
                        {{ $count }} Active
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(Session::has('message'))
    <div class="mx-6 mt-4">
        <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
            <div class="flex items-center">
                <i class="fa fa-check-circle text-green-500 mr-3"></i>
                <span class="text-sm font-medium text-green-800">{{ Session::get('message') }}</span>
            </div>
        </div>
    </div>
    @endif
    
    <form id="saveSettings" method="POST" action="{{url('/')}}/admin/updateSiteSocialMediaAjax" class="px-6 py-8" @submit="loading = true">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Facebook -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-facebook text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Facebook</h3>
                        <p class="text-sm text-gray-500">Your Facebook page URL</p>
                    </div>
                </div>
                <x-admin.form.input 
                    name="facebook" 
                    label="" 
                    type="url"
                    :value="$Setting->facebook ?? ''"
                    placeholder="https://facebook.com/yourpage"
                />
            </div>

            <!-- Twitter -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-sky-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-twitter text-sky-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Twitter</h3>
                        <p class="text-sm text-gray-500">Your Twitter profile URL</p>
                    </div>
                </div>
                <x-admin.form.input 
                    name="twitter" 
                    label="" 
                    type="url"
                    :value="$Setting->twitter ?? ''"
                    placeholder="https://twitter.com/yourhandle"
                />
            </div>

            <!-- Instagram -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-pink-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-instagram text-pink-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Instagram</h3>
                        <p class="text-sm text-gray-500">Your Instagram profile URL</p>
                    </div>
                </div>
                <x-admin.form.input 
                    name="instagram" 
                    label="" 
                    type="url"
                    :value="$Setting->instagram ?? ''"
                    placeholder="https://instagram.com/yourhandle"
                />
            </div>

            <!-- LinkedIn -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-linkedin text-blue-700 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">LinkedIn</h3>
                        <p class="text-sm text-gray-500">Your LinkedIn company/profile URL</p>
                    </div>
                </div>
                <x-admin.form.input 
                    name="linkedin" 
                    label="" 
                    type="url"
                    :value="$Setting->linkedin ?? ''"
                    placeholder="https://linkedin.com/company/yourcompany"
                />
            </div>

            <!-- YouTube -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-red-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-youtube text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">YouTube</h3>
                        <p class="text-sm text-gray-500">Your YouTube channel URL</p>
                    </div>
                </div>
                <x-admin.form.input 
                    name="youtube" 
                    label="" 
                    type="url"
                    :value="$Setting->youtube ?? ''"
                    placeholder="https://youtube.com/channel/yourchannel"
                />
            </div>

            <!-- Google+ -->
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="bg-red-100 rounded-lg p-3 mr-3">
                        <i class="fa fa-google-plus text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Google+</h3>
                        <p class="text-sm text-gray-500">Your Google+ profile URL</p>
                    </div>
                </div>
                <x-admin.form.input 
                    name="google" 
                    label="" 
                    type="url"
                    :value="$Setting->google ?? ''"
                    placeholder="https://plus.google.com/yourprofile"
                />
            </div>
        </div>

        <!-- Fixed Action Bar -->
        <div class="sticky bottom-0 bg-white border-t border-gray-200 -mx-6 px-6 py-4 mt-8 shadow-lg backdrop-blur-sm bg-white/95">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="text-sm text-gray-600 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-indigo-500"></i> 
                    <span>Social media links will be displayed on your website</span>
                </div>
                <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <a href="{{url('/')}}/admin/home" class="flex-1 sm:flex-none px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                        <i class="fa fa-times mr-2"></i> Cancel
                    </a>
                    <button type="submit" 
                            x-bind:disabled="loading"
                            class="flex-1 sm:flex-none px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-md hover:shadow-xl">
                        <i class="fa fa-save mr-2"></i> 
                        <span x-show="!loading">Save Changes</span>
                        <span x-show="loading" x-cloak>
                            <i class="fa fa-spinner fa-spin mr-2"></i> Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@else
<div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-200 text-center">
    <i class="fa fa-exclamation-triangle text-yellow-500 text-4xl mb-4"></i>
    <h3 class="text-xl font-semibold text-gray-900 mb-2">Settings Not Found</h3>
    <p class="text-gray-600">Social media settings could not be loaded. Please contact your administrator.</p>
</div>
@endif

@endsection
