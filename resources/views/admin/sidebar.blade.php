@php $SiteSettings = DB::table('_site_settings')->first(); @endphp

<div x-data="sidebarMenu()"
     x-show="$store.sidebar.sidebarOpen || window.innerWidth >= 1024"
     @resize.window="handleResize()"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full"
     class="fixed top-16 bottom-0 left-0 z-40 w-72 bg-gray-900 lg:translate-x-0 transform transition-transform duration-300 ease-in-out lg:static lg:top-0 lg:h-full overflow-y-auto shadow-2xl border-r border-gray-700/30">
    
    <!-- User Info Card -->
    <div class="px-6 py-5 border-b border-gray-700/30 bg-gray-800/50">
        <div class="flex items-center space-x-3">
            <div class="relative">
                @php
                    $userImage = Auth::user()->image ?? 'default.png';
                    $imagePath = public_path('uploads/users/' . $userImage);
                    $hasImage = Auth::user()->image && Auth::user()->image != 'default.png' && file_exists($imagePath);
                @endphp
                
                @if($hasImage)
                    <img src="{{url('/')}}/uploads/users/{{Auth::user()->image}}" 
                     alt="{{ Auth::user()->name }}" 
                         class="h-12 w-12 rounded-xl object-cover ring-2 ring-indigo-500/50 shadow-lg"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 ring-2 ring-indigo-500/50 shadow-lg flex items-center justify-center text-white font-bold text-lg hidden">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @else
                    <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 ring-2 ring-indigo-500/50 shadow-lg flex items-center justify-center text-white font-bold text-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <span class="absolute bottom-0 right-0 block h-3.5 w-3.5 rounded-full bg-green-500 ring-2 ring-gray-900"></span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-400 truncate">{{ $SiteSettings->location ?? 'Administrator' }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-4 px-3 pb-6">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{url('/')}}/admin/home" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-transparent transition-all duration-200 group {{ request()->is('admin/home') || request()->is('admin/') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/25 border-indigo-500/50' : 'border-gray-700/20' }}">
                <i class="fa fa-home mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                <span>Dashboard</span>
            </a>

            <!-- Visit Website -->
            <a href="{{url('/')}}/" 
               target="_blank" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                <i class="fa fa-globe mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                <span>Visit Website</span>
            </a>

            <!-- Divider -->
            <div class="my-4 border-t border-gray-700/30"></div>

            <!-- Home Page Slider -->
            <div>
                <button @click="toggle('slider')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-image mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Home Page Slider</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('slider') }"></i>
                </button>
                <div x-show="isOpen('slider')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/sliders" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/sliders') && !request()->is('admin/addSlider') && !request()->is('admin/editSlider*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-list mr-2"></i> All Sliders
                    </a>
                    <a href="{{url('/')}}/admin/addSlider" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/addSlider') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-plus mr-2"></i> Add Slider
                    </a>
                </div>
            </div>

            <!-- Categories -->
            <div>
                <button @click="toggle('categories')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-folder mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Categories</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('categories') }"></i>
                </button>
                <div x-show="isOpen('categories')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/categories" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/categories') && !request()->is('admin/addCategory') && !request()->is('admin/editCategories*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-list mr-2"></i> All Categories
                    </a>
                    <a href="{{url('/')}}/admin/addCategory" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/addCategory') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-plus mr-2"></i> Add Category
                    </a>
                </div>
            </div>

            <!-- Brands -->
            <div>
                <button @click="toggle('brands')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-tags mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Brands</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('brands') }"></i>
                </button>
                <div x-show="isOpen('brands')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/brands" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/brands') && !request()->is('admin/addBrand') && !request()->is('admin/editBrands*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-list mr-2"></i> All Brands
                    </a>
                    <a href="{{url('/')}}/admin/addBrand" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/addBrand') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-plus mr-2"></i> Add Brand
                    </a>
                </div>
            </div>

            <!-- Products -->
            <div>
                <button @click="toggle('products')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-shopping-cart mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Products</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('products') }"></i>
                </button>
                <div x-show="isOpen('products')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/products" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/products') && !request()->is('admin/addProduct') && !request()->is('admin/editProducts*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-list mr-2"></i> All Products
                    </a>
                    <a href="{{url('/')}}/admin/addProduct" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/addProduct') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-plus mr-2"></i> Add Product
                    </a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <button @click="toggle('services')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-cogs mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Services</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('services') }"></i>
                </button>
                <div x-show="isOpen('services')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/services" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/services') && !request()->is('admin/addservice') && !request()->is('admin/editService*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-list mr-2"></i> All Services
                    </a>
                    <a href="{{url('/')}}/admin/addservice" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/addservice') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-plus mr-2"></i> Add Service
                    </a>
                </div>
            </div>

            <!-- Divider -->
            <div class="my-4 border-t border-gray-800"></div>

            <!-- Legal Pages -->
            <div>
                <button @click="toggle('legal')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-gavel mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Legal Pages</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('legal') }"></i>
                </button>
                <div x-show="isOpen('legal')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/editAbout" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/editAbout') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-info-circle mr-2"></i> About Us
                    </a>
                    <a href="{{url('/')}}/admin/editRisk" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/editRisk') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-truck mr-2"></i> Order & Delivery
                    </a>
                    <a href="{{url('/')}}/admin/privacy" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/privacy*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-shield mr-2"></i> Privacy Policy
                    </a>
                    <a href="{{url('/')}}/admin/terms" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/terms*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-file-text mr-2"></i> Terms & Conditions
                    </a>
                    <a href="{{url('/')}}/admin/editCopyright" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/editCopyright') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-copyright mr-2"></i> Copyright
                    </a>
                </div>
            </div>

            <!-- Blog & Articles -->
            <div>
                <button @click="toggle('blog')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-rss mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Blog & Articles</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('blog') }"></i>
                </button>
                <div x-show="isOpen('blog')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/blog" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/blog') && !request()->is('admin/addBlog') && !request()->is('admin/editBlog*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-list mr-2"></i> All Blogs
                    </a>
                    <a href="{{url('/')}}/admin/addBlog" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/addBlog') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-plus mr-2"></i> Add Blog
                    </a>
                </div>
            </div>

            <!-- Divider -->
            <div class="my-4 border-t border-gray-800"></div>

            <!-- Site Settings -->
            <div>
                <button @click="toggle('settings')" 
                        type="button" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border border-gray-700/20 transition-all duration-200 group">
                    <span class="flex items-center">
                        <i class="fa fa-cog mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                        <span>Site Settings</span>
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" 
                       :class="{ 'rotate-180': isOpen('settings') }"></i>
                </button>
                <div x-show="isOpen('settings')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1 border-l-2 border-indigo-600/40 pl-4">
                    <a href="{{url('/')}}/admin/SiteSettings" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/SiteSettings') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-sliders mr-2"></i> System Settings
                    </a>
                    <a href="{{url('/')}}/admin/mailerSettings" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/mailerSettings') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-envelope mr-2"></i> Mailer Settings
                    </a>
                    <a href="{{url('/')}}/admin/credentials" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/credentials') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-key mr-2"></i> Credentials
                    </a>
                    <a href="{{url('/')}}/admin/logo-and-favicon" 
                       class="block px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:bg-indigo-600/10 hover:text-indigo-300 border border-transparent hover:border-indigo-500/20 transition-all duration-200 {{ request()->is('admin/logo-and-favicon*') ? 'bg-indigo-600/10 text-indigo-300 border-indigo-500/30' : 'border-gray-700/10' }}">
                        <i class="fa fa-image mr-2"></i> Logo & Favicon
                    </a>
                </div>
            </div>

            <!-- Social Media Settings -->
            <a href="{{url('/')}}/admin/SocialMediaSettings" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-purple-600/20 hover:text-white hover:border-indigo-500/30 border {{ request()->is('admin/SocialMediaSettings*') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/25 border-indigo-500/50' : 'border-gray-700/20' }} transition-all duration-200 group">
                <i class="fa fa-share-alt mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                <span>Social Media</span>
            </a>

            <!-- Divider -->
            <div class="my-4 border-t border-gray-700/30"></div>

            <!-- Logout -->
            <a href="{{url('/')}}/logout" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-red-400 hover:bg-red-600/20 hover:text-red-300 hover:border-red-500/30 border border-gray-700/20 transition-all duration-200 group">
                <i class="fa fa-sign-out mr-3 w-5 text-center group-hover:scale-110 transition-transform"></i> 
                <span>Logout</span>
            </a>
        </div>
    </nav>
</div>

<script>
function sidebarMenu() {
    return {
        openMenus: {
            @if(request()->is('admin/sliders*') || request()->is('admin/addSlider*') || request()->is('admin/editSlider*'))
            slider: true,
            @endif
            @if(request()->is('admin/categories*') || request()->is('admin/addCategory*') || request()->is('admin/editCategories*'))
            categories: true,
            @endif
            @if(request()->is('admin/brands*') || request()->is('admin/addBrand*') || request()->is('admin/editBrands*'))
            brands: true,
            @endif
            @if(request()->is('admin/products*') || request()->is('admin/addProduct*') || request()->is('admin/editProducts*'))
            products: true,
            @endif
            @if(request()->is('admin/services*') || request()->is('admin/addservice*') || request()->is('admin/editService*'))
            services: true,
            @endif
            @if(request()->is('admin/editAbout*') || request()->is('admin/editRisk*') || request()->is('admin/privacy*') || request()->is('admin/terms*') || request()->is('admin/editCopyright*'))
            legal: true,
            @endif
            @if(request()->is('admin/blog*') || request()->is('admin/addBlog*') || request()->is('admin/editBlog*'))
            blog: true,
            @endif
            @if(request()->is('admin/SiteSettings*') || request()->is('admin/mailerSettings*') || request()->is('admin/credentials*') || request()->is('admin/logo-and-favicon*'))
            settings: true,
            @endif
        },
        toggle(menu) {
            this.openMenus[menu] = !this.openMenus[menu];
        },
        isOpen(menu) {
            return !!this.openMenus[menu];
        },
        handleResize() {
            if (window.innerWidth >= 1024) {
                this.$store.sidebar.sidebarOpen = true;
            }
        }
    }
}
</script>
