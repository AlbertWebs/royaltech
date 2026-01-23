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
                <span class="text-gray-900 font-medium">Social Media Settings</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/home" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> Dashboard
                </a>
            </li>
        </ol>
    </nav>
</div>

@foreach ($SiteSettings as $Setting)
<!-- Form Card -->
<div class="bg-white shadow rounded-lg" x-data="{ 
    loading: false, 
    showConfirm: false,
    submitForm() {
        this.showConfirm = true;
    },
    confirmSubmit() {
        this.loading = true;
        this.showConfirm = false;
        const form = document.getElementById('saveSettings');
        const formData = new FormData(form);
        
        fetch('{{url('/')}}/admin/updateSiteSocialMediaAjax', {
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
            alert('Social media settings saved successfully!');
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        })
        .catch(error => {
            this.loading = false;
            console.error('Error:', error);
            alert('An error occurred while saving settings.');
        });
    }
}">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Social Media Settings</h3>
            <p class="text-sm text-gray-500 mt-1">Configure your social media links</p>
        </div>
    </div>
    
    <form id="saveSettings" method="POST" @submit.prevent="submitForm()" class="px-6 py-6">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Facebook -->
            <x-admin.form.input 
                name="facebook" 
                label="Facebook URL" 
                type="url"
                :value="$Setting->facebook"
                placeholder="https://facebook.com/yourpage"
            />

            <!-- Twitter -->
            <x-admin.form.input 
                name="twitter" 
                label="Twitter URL" 
                type="url"
                :value="$Setting->twitter"
                placeholder="https://twitter.com/yourhandle"
            />

            <!-- Instagram -->
            <x-admin.form.input 
                name="instagram" 
                label="Instagram URL" 
                type="url"
                :value="$Setting->instagram"
                placeholder="https://instagram.com/yourhandle"
            />

            <!-- LinkedIn -->
            <x-admin.form.input 
                name="linkedin" 
                label="LinkedIn URL" 
                type="url"
                :value="$Setting->linkedin"
                placeholder="https://linkedin.com/company/yourcompany"
            />

            <!-- Telegram -->
            <x-admin.form.input 
                name="telegram" 
                label="Telegram URL" 
                type="url"
                :value="$Setting->telegram ?? ''"
                placeholder="https://t.me/yourchannel"
            />

            <!-- WhatsApp -->
            <x-admin.form.input 
                name="whatsapp" 
                label="WhatsApp URL" 
                type="url"
                :value="$Setting->whatsapp ?? ''"
                placeholder="https://wa.me/1234567890"
            />
        </div>

        <!-- Loading State -->
        <div x-show="loading" class="mt-6 flex items-center justify-center">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            <span class="ml-2 text-sm text-gray-600">Saving changes...</span>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/home" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary" :disabled="loading">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>

    <!-- Confirmation Modal -->
    <div x-show="showConfirm" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showConfirm = false"></div>
            <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Confirm Changes</h3>
                </div>
                <div class="px-6 py-4">
                    <p class="text-sm text-gray-600">
                        Are you sure you want to save these social media settings?
                    </p>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                    <button 
                        @click="showConfirm = false"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Cancel
                    </button>
                    <button 
                        @click="confirmSubmit()"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700"
                    >
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
