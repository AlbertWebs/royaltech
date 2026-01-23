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
                <span class="text-gray-900 font-medium">Manage Users</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/addUser" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fa fa-user-plus mr-2"></i> Add New User
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">System Users</h2>
    <p class="text-sm text-gray-500 mt-1">Registered Users</p>
</div>

<!-- Users Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Users</h3>
                <p class="text-sm text-gray-500 mt-1">Manage system users</p>
            </div>
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition
                     x-cloak
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-10"
                     style="display: none;">
                    <div class="py-1">
                        <a href="{{url('/')}}/admin/addUser" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-user-plus mr-2"></i> Add New User
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-download mr-2"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['User', 'Name', 'Contacts', 'Country', 'Status', 'Actions']">
                @forelse($Users as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{url('/')}}/uploads/users/{{$item->image ?? 'default.png'}}" alt="{{$item->name}}" class="h-10 w-10 rounded-full object-cover">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="{{url('/')}}/admin/editUser/{{$item->id}}" class="hover:text-blue-600">
                                {{ $item->name }}
                            </a>
                        </div>
                        <div class="text-sm text-gray-500">
                            @if($item->is_admin == 1) 
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800">Administrator</span>
                            @else 
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">Normal User</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div>{{ $item->mobile ?? 'N/A' }}</div>
                        <div>{{ $item->email }}</div>
                        @if($item->address)
                        <div class="text-xs text-gray-400">{{ $item->address }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $item->country ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->status == 1)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                            <div class="mt-2">
                                <a href="{{url('/')}}/admin/switchStatus/{{$item->id}}" class="text-xs text-blue-600 hover:text-blue-800">
                                    <i class="fa fa-exchange mr-1"></i> Switch To Inactive
                                </a>
                            </div>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Inactive
                            </span>
                            <div class="mt-2">
                                <a href="{{url('/')}}/admin/switchStatus/{{$item->id}}" class="text-xs text-blue-600 hover:text-blue-800">
                                    <i class="fa fa-exchange mr-1"></i> Switch To Active
                                </a>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-3">
                            <a href="{{url('/')}}/admin/editUser/{{$item->id}}" class="text-blue-600 hover:text-blue-900" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <div x-data="{ 
                                confirmDelete() {
                                    if (confirm('Are you sure you want to delete this user? Once deleted, you will not be able to recover this data!')) {
                                        fetch('{{url('/')}}/admin/deleteUserAjax', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                            },
                                            body: JSON.stringify({ id: {{ $item->id }} })
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                alert('User deleted successfully!');
                                                setTimeout(() => location.reload(), 1000);
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert('An error occurred while deleting the user.');
                                        });
                                    }
                                }
                            }">
                                <button @click="confirmDelete()" class="text-red-600 hover:text-red-900" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-users text-4xl text-gray-300 mb-2"></i>
                            <p>No users found</p>
                            <a href="{{url('/')}}/admin/addUser" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fa fa-plus mr-2"></i> Add Your First User
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
