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
                <span class="text-gray-900 font-medium">Mailer Settings</span>
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
        
        fetch('{{url('/')}}/admin/updateMailerAjax', {
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
                alert('Mailer settings saved successfully!');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
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
            <h3 class="text-lg font-semibold text-gray-900">Mailer Settings</h3>
            <p class="text-sm text-gray-500 mt-1">Email configuration for mailing operations</p>
        </div>
    </div>
    
    <form id="saveSettings" method="POST" enctype="multipart/form-data" @submit.prevent="submitForm()" class="px-6 py-6">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Email -->
            <x-admin.form.input 
                name="email" 
                label="Email Address" 
                type="email"
                :value="$Setting->email"
                placeholder="email@example.com"
            />

            <!-- Title -->
            <x-admin.form.input 
                name="title" 
                label="Email Title" 
                :value="$Setting->title"
                placeholder="Enter email title"
            />

            <!-- Site Title -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="site_title" 
                    label="Site Title" 
                    :value="$Setting->site_title"
                    placeholder="Enter site title"
                />
            </div>

            <!-- Mail Driver -->
            <x-admin.form.input 
                name="driver" 
                label="Mail Driver" 
                :value="$Setting->driver"
                placeholder="smtp"
            />

            <!-- Email Host -->
            <x-admin.form.input 
                name="host" 
                label="Email Host" 
                :value="$Setting->host"
                placeholder="smtp.example.com"
            />

            <!-- Port -->
            <x-admin.form.input 
                name="port" 
                label="Mailer Port Number" 
                type="number"
                :value="$Setting->port"
                placeholder="587"
            />

            <!-- Encryption -->
            <x-admin.form.input 
                name="encryption" 
                label="Mailer Encryption" 
                :value="$Setting->encryption"
                placeholder="tls"
            />

            <!-- Username -->
            <x-admin.form.input 
                name="username" 
                label="Mail Username" 
                :value="$Setting->username"
                placeholder="Enter username"
            />

            <!-- Password -->
            <x-admin.form.input 
                name="password" 
                label="Mail Password" 
                type="password"
                :value="$Setting->password"
                placeholder="Enter password"
            />

            <!-- Location -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="location" 
                    label="Location" 
                    :value="$Setting->location"
                    placeholder="Enter location"
                />
            </div>
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
                        Are you sure you want to save these mailer settings? Once submitted, you cannot revert back to the previous state.
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
