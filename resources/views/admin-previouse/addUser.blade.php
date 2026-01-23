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
                <span class="text-gray-900 font-medium">Add User</span>
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
            <h3 class="text-lg font-semibold text-gray-900">Add New User</h3>
            <p class="text-sm text-gray-500 mt-1">Create new user</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/add_User" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Name -->
            <x-admin.form.input 
                name="name" 
                label="User Name" 
                placeholder="Enter user name"
                required
            />

            <!-- User Email -->
            <x-admin.form.input 
                name="email" 
                label="User Email" 
                type="email"
                placeholder="user@example.com"
                required
            />

            <!-- Mobile Number -->
            <x-admin.form.input 
                name="mobile" 
                label="User Mobile Number" 
                placeholder="Enter mobile number"
                required
            />

            <!-- Country -->
            <x-admin.form.input 
                name="country" 
                label="User Country" 
                placeholder="Enter country"
                required
            />

            <!-- Address -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="address" 
                    label="User Address" 
                    placeholder="Enter full address"
                    required
                />
            </div>

            <!-- User Image -->
            <div class="md:col-span-2">
                <x-admin.form.file 
                    name="image" 
                    label="User Profile Image" 
                    accept="image/*"
                    preview
                    required
                />
            </div>

            <!-- User Role -->
            <div class="md:col-span-2">
                <x-admin.form.select 
                    name="is_admin" 
                    label="User Role" 
                    :options="['0' => 'Normal User', '1' => 'Administrator']"
                    placeholder="Select user role"
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
                <i class="fa fa-save mr-2"></i> Add New User
            </x-admin.button>
        </div>
    </form>
</div>

@endsection
