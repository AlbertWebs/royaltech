<!DOCTYPE html>
<html lang="en" x-data>
@php $SiteSettings = DB::table('_site_settings')->first(); @endphp
<head>
    <title>{{ $SiteSettings->sitename ?? 'Admin' }} - Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('favicon')
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-theme/css/font-awesome.min.css')}}">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- CKEditor -->
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
</head>

<body class="bg-gray-50">
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-sm border-b border-gray-200 fixed w-full top-0 z-40">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left: Logo & Menu Toggle -->
                <div class="flex items-center">
                    <button @click="$store.sidebar.sidebarOpen = !$store.sidebar.sidebarOpen" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <i class="fa fa-bars text-xl"></i>
                    </button>
                    <a href="{{url('/')}}/admin/home" class="ml-4 lg:ml-0 flex items-center">
                        <img src="{{url('/')}}/uploads/logo/{{$SiteSettings->logo ?? 'logo.png'}}" alt="{{ $SiteSettings->sitename ?? 'Logo' }}" class="h-8 w-auto">
                    </a>
                </div>

                <!-- Center: Search (Desktop) -->
                <div class="hidden md:flex flex-1 items-center justify-center px-4">
                    <div class="w-full max-w-lg">
                        <form class="relative">
                            <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <i class="fa fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </form>
                    </div>
                </div>

                <!-- Right: Notifications & User Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="hidden md:flex items-center space-x-2">
                        @php
                            $blogCount = DB::table('blogs')->count();
                            $messageCount = DB::table('messages')->count();
                            $userCount = DB::table('users')->count();
                        @endphp
                        <a href="#" class="relative p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-lg" title="Blog Posts">
                            <i class="fa fa-commenting-o text-lg"></i>
                            @if($blogCount > 0)
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                            @endif
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $blogCount }}</span>
                        </a>
                        <a href="{{url('/')}}/admin/allMessages" class="relative p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-lg" title="Messages">
                            <i class="fa fa-envelope-o text-lg"></i>
                            @if($messageCount > 0)
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                            @endif
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $messageCount }}</span>
                        </a>
                        <a href="{{url('/')}}/admin/users" class="relative p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-lg" title="Users">
                            <i class="fa fa-user text-lg"></i>
                            <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $userCount }}</span>
                        </a>
                        <a href="{{url('/')}}/admin/SiteSettings" class="p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-lg" title="Site Settings">
                            <i class="fa fa-cog text-lg"></i>
                        </a>
                    </div>

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <img src="{{asset('admin-theme/images/user/6.png')}}" alt="User" class="h-8 w-8 rounded-full">
                            <span class="hidden md:block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <i class="fa fa-angle-down text-gray-400"></i>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             x-cloak
                             class="absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                             style="display: none;">
                            <div class="py-1">
                                <a href="{{url('/')}}/admin/SiteSettings" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa fa-cogs mr-3"></i> Site Settings
                                </a>
                                <a href="{{url('/')}}/admin/users" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa fa-user mr-3"></i> Manage Users
                                </a>
                                <a href="{{url('/')}}/admin/admins" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa fa-support mr-3"></i> Manage Admins
                                </a>
                                <a href="{{url('/')}}/admin/addUser" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa fa-user-plus mr-3"></i> Add New User
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <a href="{{url('/')}}/logout" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa fa-sign-out mr-3"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-screen pt-16">
        <!-- Sidebar -->
        @include('admin.sidebar')

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Flash Messages -->
                    @if(Session::has('message'))
                        <x-admin.alert type="success" dismissible class="mb-4">
                            {{ Session::get('message') }}
                        </x-admin.alert>
                    @endif
                    
                    @if(Session::has('messageError'))
                        <x-admin.alert type="error" dismissible class="mb-4">
                            {{ Session::get('messageError') }}
                        </x-admin.alert>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="$store.sidebar.sidebarOpen" 
         @click="$store.sidebar.sidebarOpen = false"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed inset-0 bg-gray-600 bg-opacity-75 z-30 lg:hidden"
         style="display: none;"></div>

    <!-- Scripts -->
    <script>
        // Initialize Alpine.js store for sidebar state
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                sidebarOpen: window.innerWidth >= 1024,
                init() {
                    // Ensure sidebar is open on desktop by default
                    if (window.innerWidth >= 1024) {
                        this.sidebarOpen = true;
                    }
                }
            });
        });

        // CKEditor initialization
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replaceAll('article-ckeditor');
            }
        });
    </script>
</body>
</html>
