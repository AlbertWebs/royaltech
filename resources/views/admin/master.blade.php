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

<body class="bg-gradient-to-br from-gray-50 via-white to-gray-50">
    <!-- Elegant Top Navigation Bar -->
    <nav class="bg-white/80 backdrop-blur-lg shadow-sm border-b border-gray-200/50 fixed w-full top-0 z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left: Logo & Menu Toggle -->
                <div class="flex items-center">
                    <button @click="$store.sidebar.sidebarOpen = !$store.sidebar.sidebarOpen" 
                            class="lg:hidden p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <i class="fa fa-bars text-xl"></i>
                    </button>
                    <a href="{{url('/')}}/admin/home" class="ml-4 lg:ml-0 flex items-center group">
                        <img src="{{url('/')}}/uploads/logo/{{$SiteSettings->logo ?? 'logo.png'}}" 
                             alt="{{ $SiteSettings->sitename ?? 'Logo' }}" 
                             class="h-9 w-auto transition-transform duration-200 group-hover:scale-105">
                        <span class="ml-3 text-xl font-semibold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent hidden sm:block">
                            Admin Panel
                        </span>
                    </a>
                </div>

                <!-- Right: Quick Links & User Menu -->
                <div class="flex items-center space-x-1">
                    @php
                        $blogCount = DB::table('blogs')->count();
                        $messageCount = DB::table('messages')->count();
                        $userCount = DB::table('users')->count();
                    @endphp
                    
                    <!-- Quick Links -->
                    <div class="hidden md:flex items-center space-x-1 mr-4">
                        <a href="{{url('/')}}/admin/home" 
                           class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 {{ request()->is('admin/home') || request()->is('admin/') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                            <i class="fa fa-home mr-2"></i>Dashboard
                        </a>
                        <a href="{{url('/')}}/admin/products" 
                           class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 {{ request()->is('admin/products*') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                            <i class="fa fa-shopping-cart mr-2"></i>Products
                        </a>
                        <a href="{{url('/')}}/admin/services" 
                           class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 {{ request()->is('admin/services*') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                            <i class="fa fa-cogs mr-2"></i>Services
                        </a>
                        <a href="{{url('/')}}/admin/blog" 
                           class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 {{ request()->is('admin/blog*') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                            <i class="fa fa-rss mr-2"></i>Blog
                        </a>
                        <a href="{{url('/')}}/admin/SiteSettings" 
                           class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 {{ request()->is('admin/SiteSettings*') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                            <i class="fa fa-cog mr-2"></i>Settings
                        </a>
                    </div>

                    <!-- Notifications -->
                    <div class="hidden lg:flex items-center space-x-2 mr-2">
                        <a href="{{url('/')}}/admin/blog" 
                           class="relative p-2.5 text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 group" 
                           title="Blog Posts">
                            <i class="fa fa-commenting-o text-lg"></i>
                            @if($blogCount > 0)
                            <span class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                            @endif
                            <span class="absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-semibold rounded-full h-5 w-5 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                {{ $blogCount }}
                            </span>
                        </a>
                        <a href="{{url('/')}}/admin/allMessages" 
                           class="relative p-2.5 text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 group" 
                           title="Messages">
                            <i class="fa fa-envelope-o text-lg"></i>
                            @if($messageCount > 0)
                            <span class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                            @endif
                            <span class="absolute -top-1 -right-1 bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-xs font-semibold rounded-full h-5 w-5 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                {{ $messageCount }}
                            </span>
                        </a>
                        <a href="{{url('/')}}/admin/users" 
                           class="relative p-2.5 text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 group" 
                           title="Users">
                            <i class="fa fa-users text-lg"></i>
                            <span class="absolute -top-1 -right-1 bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-xs font-semibold rounded-full h-5 w-5 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                {{ $userCount }}
                            </span>
                        </a>
                    </div>

                    <!-- Visit Website Link -->
                    <a href="{{url('/')}}/" 
                       target="_blank" 
                       class="hidden md:flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 mr-2">
                        <i class="fa fa-external-link mr-2"></i>
                        <span class="hidden lg:inline">Visit Site</span>
                    </a>

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center space-x-2 p-1.5 rounded-xl hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 group">
                            <div class="relative">
                                @php
                                    $userImage = Auth::user()->image ?? 'default.png';
                                    $imagePath = public_path('uploads/users/' . $userImage);
                                    $hasImage = Auth::user()->image && Auth::user()->image != 'default.png' && file_exists($imagePath);
                                @endphp
                                
                                @if($hasImage)
                                    <img src="{{url('/')}}/uploads/users/{{Auth::user()->image}}" 
                                     alt="{{ Auth::user()->name }}" 
                                         class="h-9 w-9 rounded-full object-cover ring-2 ring-gray-200 group-hover:ring-indigo-300 transition-all"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="h-9 w-9 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 ring-2 ring-gray-200 group-hover:ring-indigo-300 transition-all flex items-center justify-center text-white font-semibold text-sm hidden">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @else
                                    <div class="h-9 w-9 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 ring-2 ring-gray-200 group-hover:ring-indigo-300 transition-all flex items-center justify-center text-white font-semibold text-sm shadow-md">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @endif
                                <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-500 ring-2 ring-white"></span>
                            </div>
                            <div class="hidden lg:block text-left">
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <i class="fa fa-angle-down text-gray-400 text-sm transition-transform duration-200" 
                               :class="{ 'rotate-180': open }"></i>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
                             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="transform opacity-0 scale-95 -translate-y-2"
                             x-cloak
                             class="absolute right-0 mt-2 w-64 rounded-xl shadow-xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50 overflow-hidden"
                             style="display: none;">
                            <!-- User Info Header -->
                            <div class="px-4 py-3 bg-gradient-to-r from-indigo-500 to-purple-600">
                                <p class="text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-indigo-100">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <div class="py-2">
                                <a href="{{url('/')}}/admin/home" 
                                   class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="fa fa-home w-5 text-gray-400"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{url('/')}}/admin/SiteSettings" 
                                   class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="fa fa-cogs w-5 text-gray-400"></i>
                                    <span>Site Settings</span>
                                </a>
                                <a href="{{url('/')}}/admin/users" 
                                   class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="fa fa-users w-5 text-gray-400"></i>
                                    <span>Manage Users</span>
                                </a>
                                <div class="border-t border-gray-100 my-2"></div>
                                <a href="{{url('/')}}/" 
                                   target="_blank"
                                   class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="fa fa-external-link w-5 text-gray-400"></i>
                                    <span>Visit Website</span>
                                </a>
                                <div class="border-t border-gray-100 my-2"></div>
                                <a href="{{url('/')}}/logout" 
                                   class="flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fa fa-sign-out w-5"></i>
                                    <span>Logout</span>
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
        <main class="flex-1 overflow-y-auto bg-gradient-to-br from-gray-50/50 to-white">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Flash Messages -->
                    @if(Session::has('message'))
                        <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg shadow-sm">
                            <div class="flex items-center">
                                <i class="fa fa-check-circle text-green-500 mr-3"></i>
                                <p class="text-sm font-medium text-green-800">{{ Session::get('message') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if(Session::has('messageError'))
                        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
                            <div class="flex items-center">
                                <i class="fa fa-exclamation-circle text-red-500 mr-3"></i>
                                <p class="text-sm font-medium text-red-800">{{ Session::get('messageError') }}</p>
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="$store.sidebar.sidebarOpen && window.innerWidth < 1024" 
         @click="$store.sidebar.sidebarOpen = false"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-30 lg:hidden"
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
