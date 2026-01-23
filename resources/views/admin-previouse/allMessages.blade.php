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
                <span class="text-gray-900 font-medium">Messages</span>
            </li>
            <li class="ml-auto">
                <div class="flex items-center space-x-2">
                    <a href="{{url('/')}}/admin/unread" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fa fa-envelope-o mr-2"></i> Unread Messages
                    </a>
                </div>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">All Messages</h2>
    <p class="text-sm text-gray-500 mt-1">Manage customer enquiries and messages</p>
</div>

<!-- Messages Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Messages</h3>
                <p class="text-sm text-gray-500 mt-1">All customer messages and enquiries</p>
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
                        <a href="{{url('/')}}/admin/unread" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-envelope-o mr-2"></i> View Unread
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['#', 'From', 'Subject', 'Content', 'Date', 'Status', 'Actions']">
                @forelse($Message as $item)
                <tr class="hover:bg-gray-50 {{ $item->status == 0 ? 'bg-blue-50' : '' }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                        <div class="text-sm text-gray-500">{{ $item->email }}</div>
                        @if($item->phone)
                        <div class="text-xs text-gray-400">{{ $item->phone }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                        {{ $item->subject }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="max-w-md">
                            {{ Str::limit(strip_tags($item->content), 100) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->status == 0)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fa fa-envelope mr-1"></i> Unread
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fa fa-envelope-open mr-1"></i> Read
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-3">
                            <a href="{{url('/')}}/admin/read/{{$item->id}}" class="text-blue-600 hover:text-blue-900" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <div x-data="{ 
                                confirmDelete() {
                                    if (confirm('Are you sure you want to delete this message? Once deleted, you will not be able to recover this data!')) {
                                        fetch('{{url('/')}}/admin/deleteMessage/{{$item->id}}', {
                                            method: 'GET',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                            }
                                        })
                                        .then(() => {
                                            alert('Message deleted successfully!');
                                            location.reload();
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert('An error occurred while deleting the message.');
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
                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-envelope text-4xl text-gray-300 mb-2"></i>
                            <p>No messages found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
