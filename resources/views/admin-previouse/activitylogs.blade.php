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
                <span class="text-gray-900 font-medium">Activity Logs</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/home" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> Dashboard
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Activity Logs</h2>
    <p class="text-sm text-gray-500 mt-1">Registers all important activities by all users</p>
</div>

<!-- Activity Logs Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Activity Logs</h3>
            <p class="text-sm text-gray-500 mt-1">Complete activity history</p>
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
                    <a href="{{url('/')}}/admin/home" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fa fa-home mr-2"></i> Back to Dashboard
                    </a>
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
                        <div class="flex items-center">
                            @if($UserName)
                                <img src="{{url('/')}}/uploads/users/{{$UserName->image ?? 'default.png'}}" alt="{{ $UserName->name }}" class="h-8 w-8 rounded-full mr-2 object-cover">
                                <span>{{ $UserName->name }}</span>
                            @else
                                <span class="text-gray-400">Unknown User</span>
                            @endif
                        </div>
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
                        <div class="py-8">
                            <i class="fa fa-history text-4xl text-gray-300 mb-2"></i>
                            <p>No activity logs found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
        
        <!-- Pagination -->
        @if(method_exists($ActivityLog, 'links'))
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $ActivityLog->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Google Map Location -->
@if(isset($SiteSettings) && $SiteSettings && $SiteSettings->map)
<div class="mt-6">
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