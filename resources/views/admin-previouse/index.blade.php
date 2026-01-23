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
                <span class="text-gray-900 font-medium">Dashboard</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/SiteSettings" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-forward mr-1"></i> Go To Site Settings
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Dashboard Stats -->
@include('admin.dashboard')

<!-- Activity Logs -->
<div class="mb-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Activity Logs</h3>
                <p class="text-sm text-gray-500 mt-1">Registers all important activities by all users</p>
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
                        <a href="{{url('/')}}/admin/activitylogs" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Activity</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4">
            <div class="overflow-x-auto">
                <x-admin.table :headers="['#', 'User', 'Description', 'Date']">
                    @forelse($ActivityLog as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $item->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @php
                                $UserName = DB::table('users')->where('id', $item->causer_id)->first();
                            @endphp
                            {{ $UserName->name ?? 'Unknown' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <span class="inline-flex items-center text-green-600">
                                <i class="fa fa-check mr-2"></i>{{ $item->description }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y H:i') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            No activity logs found
                        </td>
                    </tr>
                    @endforelse
                </x-admin.table>
            </div>
        </div>
    </div>
</div>

<!-- Notifications -->
<div class="mb-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
                <p class="text-sm text-gray-500 mt-1">All site notifications</p>
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
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Add New</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update</a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            <i class="fa fa-trash mr-2"></i>Delete
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-list mr-2"></i>View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4">
            <div class="text-center py-8 text-gray-500">
                <i class="fa fa-bell text-4xl mb-2"></i>
                <p>No notifications available</p>
            </div>
        </div>
    </div>
</div>

<!-- System Users -->
<div class="mb-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">System Users</h3>
                <p class="text-sm text-gray-500 mt-1">Registered Users</p>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{url('/')}}/admin/addUser" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fa fa-plus mr-2"></i> Add New User
                </a>
            </div>
        </div>
        <div class="px-6 py-4">
            @php $Users = DB::table('users')->get(); @endphp
            <div class="overflow-x-auto">
                <x-admin.table :headers="['User', 'Name', 'Contacts', 'Country', 'Status', 'Actions']">
                    @forelse($Users as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{url('/')}}/uploads/users/{{$item->image ?? 'default.png'}}" alt="{{$item->name}}" class="h-10 w-10 rounded-full">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="{{url('/')}}/admin/editUser/{{$item->id}}" class="hover:text-blue-600">
                                    {{ $item->name }}
                                </a>
                            </div>
                            <div class="text-sm text-gray-500">
                                @if($item->is_admin == 1) Administrator @else Normal User @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <div>{{ $item->mobile }}</div>
                            <div>{{ $item->email }}</div>
                            <div>{{ $item->address }}</div>
                            <div>{{ $item->country }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->country }}
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
                            <div x-data="{ confirmDelete() {
                                if (confirm('Are you sure you want to delete this user?')) {
                                    fetch('{{url('/')}}/admin/deleteUserAjax', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                        },
                                        body: JSON.stringify({ id: {{ $item->id }} })
                                    })
                                    .then(() => {
                                        alert('User deleted successfully');
                                        location.reload();
                                    });
                                }
                            } }">
                                <button @click="confirmDelete()" class="text-red-600 hover:text-red-900">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            No users found
                        </td>
                    </tr>
                    @endforelse
                </x-admin.table>
            </div>
        </div>
    </div>
</div>

<!-- Latest Messages -->
<div class="mb-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Latest Messages</h3>
            <p class="text-sm text-gray-500 mt-1">Latest Messages & Enquiries</p>
        </div>
        <div class="px-6 py-4">
            @forelse($Message as $item)
            <div class="border-l-4 border-blue-500 pl-4 py-3 mb-4">
                <div class="flex items-start">
                    <i class="fa fa-clock-o text-gray-400 mr-3 mt-1"></i>
                    <div class="flex-1">
                        @php
                            $RawDate = $item->created_at;
                            $FormatDate = strtotime($RawDate);
                            $Month = date('M', $FormatDate);
                            $Date = date('D', $FormatDate);
                            $date = date('d', $FormatDate);
                            $Year = date('Y', $FormatDate);
                        @endphp
                        <h4 class="text-sm font-medium text-gray-900">
                            <span class="text-gray-500">{{$Date}}, {{$date}} {{$Month}}, {{$Year}}</span> {{$item->subject}}
                        </h4>
                        <p class="text-sm text-gray-600 mt-1">{{$item->content}}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-500">
                <i class="fa fa-envelope text-4xl mb-2"></i>
                <p>No messages available</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Google Map Location -->
@if(isset($SiteSettings) && $SiteSettings->map)
<div class="mb-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Our Location On Google Map</h3>
        </div>
        <div class="px-6 py-4">
            <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                <iframe src="{{$SiteSettings->map}}" style="border:0;" allowfullscreen="" loading="lazy" class="w-full h-96"></iframe>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
