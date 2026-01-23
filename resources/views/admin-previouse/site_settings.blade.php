@extends('admin.master')

@section('content')
<!-- Breadcrumbs -->
<div class="mb-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{url('/')}}/admin/home" class="text-gray-400 hover:text-gray-500 transition-colors">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">System Settings</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/home" class="text-blue-600 hover:text-blue-800 text-sm font-medium transition-colors">
                    <i class="fa fa-backward mr-1"></i> Dashboard
                </a>
            </li>
        </ol>
    </nav>
</div>

@if($SiteSettings)
<!-- Form Card -->
<div class="bg-white shadow-lg rounded-xl overflow-hidden" x-data="{ 
    loading: false, 
    showConfirm: false,
    showSuccess: false,
    successMessage: '',
    activeTab: 'general',
    submitForm() {
        this.showConfirm = true;
    },
    confirmSubmit() {
        this.loading = true;
        this.showConfirm = false;
        const form = document.getElementById('saveSettings');
        const formData = new FormData(form);
        
        fetch('{{url('/')}}/admin/updateSiteSettingsAjax', {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
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
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 border-b border-blue-800">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <i class="fa fa-cogs mr-3"></i> System Settings
                </h2>
                <p class="text-blue-100 mt-1 text-sm">Manage your website configuration and preferences</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-blue-500 bg-opacity-30 rounded-lg px-4 py-2">
                    <div class="text-xs text-blue-100 uppercase tracking-wide">Last Updated</div>
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
        <x-admin.alert type="success" dismissible>
            <i class="fa fa-check-circle mr-2"></i> <span x-text="successMessage"></span>
        </x-admin.alert>
    </div>

    <!-- Tabs Navigation -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50 shadow-sm">
        <nav class="flex space-x-1 px-6 overflow-x-auto scrollbar-hide" aria-label="Tabs" style="scrollbar-width: none; -ms-overflow-style: none;">
            <button type="button"
                    @click="activeTab = 'general'" 
                    :class="activeTab === 'general' ? 'text-blue-700 bg-blue-50 shadow-sm border-b-2 border-blue-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300 hover:bg-gray-100'"
                    class="relative px-6 py-4 text-sm font-semibold transition-all duration-300 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-t-lg -mb-px">
                <span class="flex items-center justify-center">
                    <i class="fa fa-info-circle mr-2.5 text-base"></i> 
                    <span>General</span>
                </span>
                <span x-show="activeTab === 'general'" 
                      x-transition:enter="transition-all duration-300"
                      x-transition:enter-start="opacity-0 scale-0"
                      x-transition:enter-end="opacity-100 scale-100"
                      class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 h-1 bg-blue-600 rounded-full"></span>
            </button>
            <button type="button"
                    @click="activeTab = 'contact'" 
                    :class="activeTab === 'contact' ? 'text-blue-700 bg-blue-50 shadow-sm border-b-2 border-blue-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300 hover:bg-gray-100'"
                    class="relative px-6 py-4 text-sm font-semibold transition-all duration-300 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-t-lg -mb-px">
                <span class="flex items-center justify-center">
                    <i class="fa fa-phone mr-2.5 text-base"></i> 
                    <span>Contact Info</span>
                </span>
                <span x-show="activeTab === 'contact'" 
                      x-transition:enter="transition-all duration-300"
                      x-transition:enter-start="opacity-0 scale-0"
                      x-transition:enter-end="opacity-100 scale-100"
                      class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 h-1 bg-blue-600 rounded-full"></span>
            </button>
            <button type="button"
                    @click="activeTab = 'integrations'" 
                    :class="activeTab === 'integrations' ? 'text-blue-700 bg-blue-50 shadow-sm border-b-2 border-blue-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300 hover:bg-gray-100'"
                    class="relative px-6 py-4 text-sm font-semibold transition-all duration-300 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-t-lg -mb-px">
                <span class="flex items-center justify-center">
                    <i class="fa fa-plug mr-2.5 text-base"></i> 
                    <span>Integrations</span>
                </span>
                <span x-show="activeTab === 'integrations'" 
                      x-transition:enter="transition-all duration-300"
                      x-transition:enter-start="opacity-0 scale-0"
                      x-transition:enter-end="opacity-100 scale-100"
                      class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 h-1 bg-blue-600 rounded-full"></span>
            </button>
            <button type="button"
                    @click="activeTab = 'content'" 
                    :class="activeTab === 'content' ? 'text-blue-700 bg-blue-50 shadow-sm border-b-2 border-blue-600' : 'border-b-2 border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300 hover:bg-gray-100'"
                    class="relative px-6 py-4 text-sm font-semibold transition-all duration-300 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-t-lg -mb-px">
                <span class="flex items-center justify-center">
                    <i class="fa fa-file-text-o mr-2.5 text-base"></i> 
                    <span>Content</span>
                </span>
                <span x-show="activeTab === 'content'" 
                      x-transition:enter="transition-all duration-300"
                      x-transition:enter-start="opacity-0 scale-0"
                      x-transition:enter-end="opacity-100 scale-100"
                      class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 h-1 bg-blue-600 rounded-full"></span>
            </button>
        </nav>
        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
        </style>
    </div>
    
    <form id="saveSettings" method="POST" enctype="multipart/form-data" @submit.prevent="submitForm()" class="px-6 py-8">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        
        <!-- General Tab -->
        <div x-show="activeTab === 'general'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-2">
            <div class="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-globe text-blue-600"></i>
                    </div> 
                    Basic Information
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Website URL -->
                    <div>
                        <x-admin.form.input 
                            name="url" 
                            label="Website URL" 
                            type="url"
                            :value="$SiteSettings->url"
                            placeholder="https://example.com"
                            help="Your website's main URL"
                        />
                    </div>

                    <!-- Site Name -->
                    <div>
                        <x-admin.form.input 
                            name="sitename" 
                            label="Site Name" 
                            :value="$SiteSettings->sitename"
                            placeholder="Enter site name"
                            help="The name of your website"
                        />
                    </div>

                    <!-- Tagline -->
                    <div class="lg:col-span-2">
                        <x-admin.form.input 
                            name="tagline" 
                            label="Tagline" 
                            :value="$SiteSettings->tagline"
                            placeholder="Enter site tagline"
                            help="A short description or tagline for your website"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-map-marker text-blue-600"></i>
                    </div>
                    Location Information
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Location -->
                    <div>
                        <x-admin.form.input 
                            name="location" 
                            label="Location" 
                            :value="$SiteSettings->location"
                            placeholder="Enter location (e.g., Nairobi, Kenya)"
                            help="Your business location"
                        />
                    </div>

                    <!-- Address -->
                    <div>
                        <x-admin.form.input 
                            name="address" 
                            label="Full Address" 
                            :value="$SiteSettings->address"
                            placeholder="Enter full address"
                            help="Complete physical address"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Info Tab -->
        <div x-show="activeTab === 'contact'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-2">
            <div class="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-phone text-blue-600"></i>
                    </div>
                    Phone Numbers
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Mobile One -->
                    <div>
                        <x-admin.form.input 
                            name="mobile_one" 
                            label="Primary Phone" 
                            :value="$SiteSettings->mobile_one"
                            placeholder="+254 700 000 000"
                            help="Main contact number"
                        />
                    </div>

                    <!-- Mobile Two -->
                    <div>
                        <x-admin.form.input 
                            name="mobile_two" 
                            label="Alternate Phone" 
                            :value="$SiteSettings->mobile_two"
                            placeholder="+254 700 000 000"
                            help="Secondary contact number (optional)"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-envelope text-blue-600"></i>
                    </div>
                    Email Addresses
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Email One -->
                    <div>
                        <x-admin.form.input 
                            name="email_one" 
                            label="Primary Email" 
                            type="email"
                            :value="$SiteSettings->email_one"
                            placeholder="info@example.com"
                            help="Main contact email"
                        />
                    </div>

                    <!-- Email Alternate -->
                    <div>
                        <x-admin.form.input 
                            name="email" 
                            label="Alternate Email" 
                            type="email"
                            :value="$SiteSettings->email"
                            placeholder="contact@example.com"
                            help="Secondary email (optional)"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-credit-card text-blue-600"></i>
                    </div>
                    Payment Information
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- M-PESA -->
                    <div>
                        <x-admin.form.input 
                            name="mpesa" 
                            label="M-PESA TILL/PAYBILL" 
                            :value="$SiteSettings->mpesa"
                            placeholder="Enter M-PESA details"
                            help="M-PESA Till or Paybill number"
                        />
                    </div>

                    <!-- PayPal -->
                    <div>
                        <x-admin.form.input 
                            name="paypal" 
                            label="PayPal Email" 
                            type="email"
                            :value="$SiteSettings->paypal"
                            placeholder="paypal@example.com"
                            help="PayPal account email (optional)"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Integrations Tab -->
        <div x-show="activeTab === 'integrations'" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-2">
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-toggle-on text-blue-600"></i>
                    </div>
                    Feature Toggles
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Live Chat Status -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 flex items-center mb-1">
                                    <i class="fa fa-comments mr-2 text-blue-600"></i> Live Chat
                                </h4>
                                <p class="text-sm text-gray-600">Enable Tawk.To live chat widget</p>
                            </div>
                            <div class="ml-4">
                                <x-admin.form.toggle 
                                    name="tawkToStatus" 
                                    label=""
                                    :value="$SiteSettings->tawkToStatus == 1"
                                />
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-admin.form.textarea 
                                name="tawkTo" 
                                label="Tawk.To Script" 
                                :value="$SiteSettings->tawkTo"
                                rows="4"
                                placeholder="Paste Tawk.To script here"
                                help="Paste the complete Tawk.To JavaScript code here"
                            />
                        </div>
                    </div>

                    <!-- WhatsApp Widget Status -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow">
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
                                    :value="$SiteSettings->whatsAppStatus == 1"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-map text-blue-600"></i>
                    </div>
                    Google Maps
                </h3>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <x-admin.form.textarea 
                        name="map" 
                        label="Google Map Embed Code" 
                        :value="$SiteSettings->map"
                        rows="4"
                        placeholder="Paste Google Maps embed iframe code here"
                        help="Paste the complete Google Maps iframe embed code here. This will display your location on the website."
                    />
                    @if($SiteSettings->map)
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
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-2">
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-5 flex items-center">
                    <div class="bg-blue-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-file-text-o text-blue-600"></i>
                    </div>
                    Welcome Message
                </h3>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                        Welcome Message <span class="text-red-500">*</span>
                        <span class="text-xs font-normal text-gray-500 ml-2">(This appears on your homepage)</span>
                    </label>
                    <textarea 
                        id="article-ckeditor" 
                        name="welcome" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[200px]"
                        rows="12"
                        required
                    >{{ $SiteSettings->welcome }}</textarea>
                    <p class="mt-2 text-sm text-gray-500">
                        <i class="fa fa-info-circle mr-1"></i> Use the editor above to format your welcome message with rich text formatting.
                    </p>
                    <script>
                        if (typeof CKEDITOR !== 'undefined') {
                            CKEDITOR.replace('article-ckeditor', {
                                height: 400,
                                toolbar: [
                                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                                    { name: 'links', items: ['Link', 'Unlink'] },
                                    { name: 'insert', items: ['Image', 'Table'] },
                                    { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                    { name: 'colors', items: ['TextColor', 'BGColor'] },
                                    { name: 'tools', items: ['Maximize', 'Source'] }
                                ]
                            });
                        }
                    </script>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div x-show="loading" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-2"
             x-cloak
             class="fixed bottom-4 right-4 bg-white rounded-lg shadow-xl border border-gray-200 p-4 flex items-center z-50 min-w-[200px]"
             style="display: none;">
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600 mr-3"></div>
            <span class="text-sm font-medium text-gray-700">Saving changes...</span>
        </div>

        <!-- Fixed Action Bar -->
        <div class="sticky bottom-0 bg-white border-t border-gray-200 -mx-6 px-6 py-4 mt-8 shadow-lg backdrop-blur-sm bg-white/95">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="text-sm text-gray-600 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-blue-500"></i> 
                    <span>Make sure to save your changes before leaving this page</span>
                </div>
                <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <a href="{{url('/')}}/admin/home" class="flex-1 sm:flex-none px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                        <i class="fa fa-times mr-2"></i> Cancel
                    </a>
                    <button type="submit" 
                            x-bind:disabled="loading"
                            class="flex-1 sm:flex-none px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg text-sm font-semibold hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-md hover:shadow-xl transform hover:scale-105 active:scale-95">
                        <i class="fa fa-save mr-2"></i> 
                        <span x-text="loading ? 'Saving...' : 'Save All Changes'"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Confirmation Modal -->
    <div x-show="showConfirm" 
         x-cloak
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" @click="showConfirm = false"></div>
            <div x-show="showConfirm"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-xl bg-white shadow-2xl transition-all max-w-md w-full">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 bg-opacity-30 rounded-full p-2">
                            <i class="fa fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-white">Confirm Changes</h3>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-5">
                    <p class="text-sm text-gray-700 leading-relaxed">
                        Are you sure you want to save these changes? This will update your website settings immediately.
                    </p>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3 rounded-b-xl">
                    <button 
                        @click="showConfirm = false"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
                    >
                        <i class="fa fa-times mr-2"></i> Cancel
                    </button>
                    <button 
                        @click="confirmSubmit()"
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg text-sm font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md hover:shadow-lg"
                    >
                        <i class="fa fa-check mr-2"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
