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
                <a href="{{url('/')}}/admin/users" class="text-gray-400 hover:text-gray-500">Users</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit User</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/users" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Users
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Edit User</h3>
            <p class="text-sm text-gray-500 mt-1">Update user information</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_User/{{$User->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Name -->
            <x-admin.form.input 
                name="name" 
                label="User Name" 
                :value="$User->name"
                placeholder="Enter user name"
                required
            />

            <!-- User Email -->
            <x-admin.form.input 
                name="email" 
                label="User Email" 
                type="email"
                :value="$User->email"
                placeholder="user@example.com"
                required
            />

            <!-- Mobile Number -->
            <x-admin.form.input 
                name="mobile" 
                label="User Mobile Number" 
                :value="$User->mobile"
                placeholder="Enter mobile number"
                required
            />

            <!-- Country -->
            <x-admin.form.input 
                name="country" 
                label="User Country" 
                :value="$User->country"
                placeholder="Enter country"
                required
            />

            <!-- Address -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="address" 
                    label="User Address" 
                    :value="$User->address"
                    placeholder="Enter full address"
                    required
                />
            </div>

            <!-- User Image -->
            <div class="md:col-span-2" x-data="{ preview: '{{url('/')}}/uploads/users/{{$User->image}}', fileName: '' }">
                <label class="block text-sm font-medium text-gray-700 mb-2">User Profile Image</label>
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
                    <img :src="preview" alt="User Image Preview" class="h-32 w-32 object-cover rounded-full border-2 border-gray-200">
                </div>
                <input type="hidden" name="image_cheat" value="{{$User->image}}">
            </div>

            <!-- Author (Read-only) -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="author" 
                    label="Author" 
                    :value="Auth::user()->name"
                    readonly
                    required
                />
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/users" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
