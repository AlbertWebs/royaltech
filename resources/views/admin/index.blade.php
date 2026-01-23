@extends('admin.master')

@section('content')
@php
    $productCount = DB::table('products')->count();
    $categoryCount = DB::table('categories')->count();
    $brandCount = DB::table('brands')->count();
    $serviceCount = DB::table('services')->count();
    $blogCount = DB::table('blogs')->count();
    $userCount = DB::table('users')->count();
    $messageCount = DB::table('messages')->count();
    $sliderCount = DB::table('sliders')->count();
@endphp

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
                <span class="text-gray-900 font-medium">Dashboard</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Products Card -->
    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-indigo-100 text-sm font-medium mb-1">Total Products</p>
                <h3 class="text-3xl font-bold">{{ $productCount }}</h3>
                <a href="{{url('/')}}/admin/products" class="text-indigo-100 hover:text-white text-sm mt-2 inline-flex items-center">
                    View all <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="bg-white/20 rounded-lg p-4">
                <i class="fa fa-shopping-cart text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Categories Card -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium mb-1">Categories</p>
                <h3 class="text-3xl font-bold">{{ $categoryCount }}</h3>
                <a href="{{url('/')}}/admin/categories" class="text-purple-100 hover:text-white text-sm mt-2 inline-flex items-center">
                    View all <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="bg-white/20 rounded-lg p-4">
                <i class="fa fa-folder text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Services Card -->
    <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-pink-100 text-sm font-medium mb-1">Services</p>
                <h3 class="text-3xl font-bold">{{ $serviceCount }}</h3>
                <a href="{{url('/')}}/admin/services" class="text-pink-100 hover:text-white text-sm mt-2 inline-flex items-center">
                    View all <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="bg-white/20 rounded-lg p-4">
                <i class="fa fa-cogs text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Blogs Card -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium mb-1">Blog Posts</p>
                <h3 class="text-3xl font-bold">{{ $blogCount }}</h3>
                <a href="{{url('/')}}/admin/blog" class="text-blue-100 hover:text-white text-sm mt-2 inline-flex items-center">
                    View all <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="bg-white/20 rounded-lg p-4">
                <i class="fa fa-rss text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-md p-5 border border-gray-200">
        <div class="flex items-center">
            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                <i class="fa fa-tags text-indigo-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Brands</p>
                <p class="text-2xl font-bold text-gray-900">{{ $brandCount }}</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md p-5 border border-gray-200">
        <div class="flex items-center">
            <div class="bg-green-100 rounded-lg p-3 mr-4">
                <i class="fa fa-users text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Users</p>
                <p class="text-2xl font-bold text-gray-900">{{ $userCount }}</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md p-5 border border-gray-200">
        <div class="flex items-center">
            <div class="bg-yellow-100 rounded-lg p-3 mr-4">
                <i class="fa fa-envelope text-yellow-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Messages</p>
                <p class="text-2xl font-bold text-gray-900">{{ $messageCount }}</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md p-5 border border-gray-200">
        <div class="flex items-center">
            <div class="bg-red-100 rounded-lg p-3 mr-4">
                <i class="fa fa-image text-red-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Sliders</p>
                <p class="text-2xl font-bold text-gray-900">{{ $sliderCount }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Activity Logs -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">Activity Logs</h3>
                    <p class="text-indigo-100 text-sm mt-1">Recent system activities</p>
                </div>
                <a href="{{url('/')}}/admin/activitylogs" class="text-indigo-100 hover:text-white text-sm font-medium">
                    View All <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4 max-h-96 overflow-y-auto">
                @forelse($ActivityLog as $item)
                <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="bg-indigo-100 rounded-full p-2">
                            <i class="fa fa-check-circle text-indigo-600 text-sm"></i>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900 font-medium">
                            @php
                                $UserName = DB::table('users')->where('id', $item->causer_id)->first();
                            @endphp
                            {{ $UserName->name ?? 'System' }}
                        </p>
                        <p class="text-sm text-gray-600 mt-1">{{ $item->description }}</p>
                        <p class="text-xs text-gray-400 mt-1">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y H:i') }}
                        </p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <i class="fa fa-history text-4xl mb-2"></i>
                    <p>No activity logs found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Latest Messages -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
        <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-4 border-b border-blue-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">Latest Messages</h3>
                    <p class="text-blue-100 text-sm mt-1">Recent enquiries & messages</p>
                </div>
                <a href="{{url('/')}}/admin/allMessages" class="text-blue-100 hover:text-white text-sm font-medium">
                    View All <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4 max-h-96 overflow-y-auto">
                @forelse($Message as $item)
                <div class="border-l-4 border-blue-500 pl-4 py-3 rounded-r-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-start">
                        <i class="fa fa-envelope text-blue-500 mr-3 mt-1"></i>
                        <div class="flex-1">
                            @php
                                $RawDate = $item->created_at;
                                $FormatDate = strtotime($RawDate);
                                $Month = date('M', $FormatDate);
                                $Date = date('D', $FormatDate);
                                $date = date('d', $FormatDate);
                                $Year = date('Y', $FormatDate);
                            @endphp
                            <h4 class="text-sm font-semibold text-gray-900">
                                {{$item->subject}}
                            </h4>
                            <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{$item->content}}</p>
                            <p class="text-xs text-gray-400 mt-2">
                                <i class="fa fa-clock-o mr-1"></i>{{$Date}}, {{$date}} {{$Month}}, {{$Year}}
                            </p>
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
</div>

<!-- Notifications -->
<div class="mb-6">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
        <div class="bg-gradient-to-r from-yellow-500 to-orange-500 px-6 py-4 border-b border-yellow-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">Notifications</h3>
                    <p class="text-yellow-100 text-sm mt-1">System notifications</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            @forelse($Notifications as $item)
            <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-yellow-100 rounded-full p-2">
                        <i class="fa fa-bell text-yellow-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900 font-medium">{{ $item->data ?? 'Notification' }}</p>
                    <p class="text-xs text-gray-400 mt-1">
                        {{ \Carbon\Carbon::parse($item->created_at ?? now())->format('M d, Y H:i') }}
                    </p>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-500">
                <i class="fa fa-bell text-4xl mb-2"></i>
                <p>No notifications available</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Google Map Location -->
@if(isset($SiteSettings) && !empty($SiteSettings->map))
<div class="mb-6">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
        <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-4 border-b border-green-800">
            <h3 class="text-lg font-semibold text-white">Our Location</h3>
            <p class="text-green-100 text-sm mt-1">Find us on Google Maps</p>
        </div>
        <div class="p-6">
            <div class="rounded-lg overflow-hidden border border-gray-200">
                {!! $SiteSettings->map !!}
            </div>
        </div>
    </div>
</div>
@endif

@endsection
