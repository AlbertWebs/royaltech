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
                <span class="text-gray-900 font-medium">System Settings</span>
            </li>
        </ol>
    </nav>
</div>

@if($SiteSettings)
<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200" x-data="{ 
    loading: false, 
    showSuccess: false,
    successMessage: '',
    activeTab: 'general',
    submitForm() {
        this.loading = true;
        const form = document.getElementById('saveSettings');
        const formData = new FormData(form);
        
        fetch('{{url('/')}}/admin/updateSiteSettingsAjax', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            this.loading = false;
            if (data.success) {
                this.showSuccess = true;
                this.successMessage = 'Settings saved successfully!';
                setTimeout(() => {
                    this.showSuccess = false;
                }, 5000);
            } else {
                alert('An error occurred while saving settings.');
            }
        })
        .catch(error => {
            this.loading = false;
            console.error('Error:', error);
            alert('An error occurred while saving settings.');
        });
    }
}">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 px-6 py-6 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <i class="fa fa-cogs mr-3"></i> System Settings
                </h2>
                <p class="text-indigo-100 mt-1 text-sm">Manage your website configuration and preferences</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-indigo-500/30 backdrop-blur-sm rounded-xl px-4 py-2 border border-indigo-400/30">
                    <div class="text-xs text-indigo-100 uppercase tracking-wide">Last Updated</div>
                    <div class="text-sm text-white font-medium">{{ \Carbon\Carbon::parse($SiteSettings->updated_at ?? now())->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div x-show="showSuccess" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-cloak
         class="mx-6 mt-4">
        <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
            <div class="flex items-center">
                <i class="fa fa-check-circle text-green-500 mr-3"></i>
                <span class="text-sm font-medium text-green-800" x-text="successMessage"></span>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50">
        <nav class="flex space-x-1 px-6 overflow-x-auto" aria-label="Tabs">
            <button type="button"
                    @click="activeTab = 'general'" 
                    :class="activeTab === 'general' ? 'text-indigo-700 bg-indigo-50 border-b-2 border-indigo-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300'"
                    class="px-6 py-4 text-sm font-semibold transition-all duration-200 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-t-lg">
                <i class="fa fa-info-circle mr-2"></i> General
            </button>
            <button type="button"
                    @click="activeTab = 'contact'" 
                    :class="activeTab === 'contact' ? 'text-indigo-700 bg-indigo-50 border-b-2 border-indigo-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300'"
                    class="px-6 py-4 text-sm font-semibold transition-all duration-200 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-t-lg">
                <i class="fa fa-phone mr-2"></i> Contact Info
            </button>
            <button type="button"
                    @click="activeTab = 'integrations'" 
                    :class="activeTab === 'integrations' ? 'text-indigo-700 bg-indigo-50 border-b-2 border-indigo-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300'"
                    class="px-6 py-4 text-sm font-semibold transition-all duration-200 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-t-lg">
                <i class="fa fa-plug mr-2"></i> Integrations
            </button>
            <button type="button"
                    @click="activeTab = 'content'" 
                    :class="activeTab === 'content' ? 'text-indigo-700 bg-indigo-50 border-b-2 border-indigo-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300'"
                    class="px-6 py-4 text-sm font-semibold transition-all duration-200 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-t-lg">
                <i class="fa fa-file-text-o mr-2"></i> Content
            </button>
        </nav>
    </div>
    
    <form id="saveSettings" method="POST" @submit.prevent="submitForm()" class="px-6 py-8">
        @csrf
        @method('PUT')
        
        <!-- General Tab -->
        <div x-show="activeTab === 'general'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="mb-8 bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-globe text-indigo-600"></i>
                    </div> 
                    Basic Information
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <x-admin.form.input 
                            name="url" 
                            label="Website URL" 
                            type="url"
                            :value="$SiteSettings->url ?? ''"
                            placeholder="https://example.com"
                        />
                    </div>
                    <div>
                        <x-admin.form.input 
                            name="sitename" 
                            label="Site Name" 
                            :value="$SiteSettings->sitename ?? ''"
                            placeholder="Enter site name"
                        />
                    </div>
                    <div class="lg:col-span-2">
                        <x-admin.form.input 
                            name="tagline" 
                            label="Tagline" 
                            :value="$SiteSettings->tagline ?? ''"
                            placeholder="Enter site tagline"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-8 bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-map-marker text-indigo-600"></i>
                    </div>
                    Location Information
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <x-admin.form.input 
                            name="location" 
                            label="Location" 
                            :value="$SiteSettings->location ?? ''"
                            placeholder="Enter location (e.g., Nairobi, Kenya)"
                        />
                    </div>
                    <div>
                        <x-admin.form.input 
                            name="address" 
                            label="Full Address" 
                            :value="$SiteSettings->address ?? ''"
                            placeholder="Enter full address"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Info Tab -->
        <div x-show="activeTab === 'contact'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="mb-8 bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-phone text-indigo-600"></i>
                    </div>
                    Phone Numbers
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <x-admin.form.input 
                            name="mobile_one" 
                            label="Primary Phone" 
                            :value="$SiteSettings->mobile_one ?? ''"
                            placeholder="+254 700 000 000"
                        />
                    </div>
                    <div>
                        <x-admin.form.input 
                            name="mobile_two" 
                            label="Alternate Phone" 
                            :value="$SiteSettings->mobile_two ?? ''"
                            placeholder="+254 700 000 000"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-8 bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-envelope text-indigo-600"></i>
                    </div>
                    Email Addresses
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <x-admin.form.input 
                            name="email_one" 
                            label="Primary Email" 
                            type="email"
                            :value="$SiteSettings->email_one ?? ''"
                            placeholder="info@example.com"
                        />
                    </div>
                    <div>
                        <x-admin.form.input 
                            name="email" 
                            label="Alternate Email" 
                            type="email"
                            :value="$SiteSettings->email ?? ''"
                            placeholder="contact@example.com"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-8 bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-credit-card text-indigo-600"></i>
                    </div>
                    Payment Information
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <x-admin.form.input 
                            name="mpesa" 
                            label="M-PESA TILL/PAYBILL" 
                            :value="$SiteSettings->mpesa ?? ''"
                            placeholder="Enter M-PESA details"
                        />
                    </div>
                    <div>
                        <x-admin.form.input 
                            name="paypal" 
                            label="PayPal Email" 
                            type="email"
                            :value="$SiteSettings->paypal ?? ''"
                            placeholder="paypal@example.com"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Integrations Tab -->
        <div x-show="activeTab === 'integrations'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-toggle-on text-indigo-600"></i>
                    </div>
                    Feature Toggles
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 flex items-center mb-1">
                                    <i class="fa fa-comments mr-2 text-indigo-600"></i> Live Chat
                                </h4>
                                <p class="text-sm text-gray-600">Enable Tawk.To live chat widget</p>
                            </div>
                            <div class="ml-4">
                                <x-admin.form.toggle 
                                    name="tawkToStatus" 
                                    label=""
                                    :value="($SiteSettings->tawkToStatus ?? 0) == 1"
                                />
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-admin.form.textarea 
                                name="tawkTo" 
                                label="Tawk.To Script" 
                                :value="$SiteSettings->tawkTo ?? ''"
                                rows="4"
                                placeholder="Paste Tawk.To script here"
                            />
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 flex items-center mb-1">
                                    <i class="fa fa-whatsapp mr-2 text-green-600"></i> WhatsApp Widget
                                </h4>
                                <p class="text-sm text-gray-600">Enable WhatsApp chat widget</p>
                            </div>
                            <div class="ml-4">
                                <x-admin.form.toggle 
                                    name="whatsAppStatus" 
                                    label=""
                                    :value="($SiteSettings->whatsAppStatus ?? 0) == 1"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-map text-indigo-600"></i>
                    </div>
                    Google Maps
                </h3>
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <x-admin.form.textarea 
                        name="map" 
                        label="Google Map Embed Code" 
                        :value="$SiteSettings->map ?? ''"
                        rows="4"
                        placeholder="Paste Google Maps embed iframe code here"
                    />
                    @if(!empty($SiteSettings->map))
                    <div class="mt-4 p-4 bg-white rounded-lg border border-gray-200">
                        <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
                        <div class="rounded-lg overflow-hidden border border-gray-300">
                            {!! $SiteSettings->map !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content Tab -->
        <div x-show="activeTab === 'content'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-file-text-o text-indigo-600"></i>
                    </div>
                    Welcome Message
                </h3>
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                        Welcome Message <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="article-ckeditor" 
                        name="welcome" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[200px]"
                        rows="12"
                    >{{ $SiteSettings->welcome ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Fixed Action Bar -->
        <div class="sticky bottom-0 bg-white border-t border-gray-200 -mx-6 px-6 py-4 mt-8 shadow-lg backdrop-blur-sm bg-white/95">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="text-sm text-gray-600 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-indigo-500"></i> 
                    <span>Make sure to save your changes before leaving this page</span>
                </div>
                <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <a href="{{url('/')}}/admin/home" class="flex-1 sm:flex-none px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                        <i class="fa fa-times mr-2"></i> Cancel
                    </a>
                    <button type="submit" 
                            x-bind:disabled="loading"
                            class="flex-1 sm:flex-none px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-md hover:shadow-xl">
                        <i class="fa fa-save mr-2"></i> 
                        <span x-text="loading ? 'Saving...' : 'Save All Changes'"></span>
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
    <p class="text-gray-600">Site settings could not be loaded. Please contact your administrator.</p>
</div>
@endif

@endsection
