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
     class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-900 pt-16 lg:translate-x-0 transform transition-transform duration-300 ease-in-out lg:static lg:inset-0 overflow-y-auto"
     :class="{ '-translate-x-full': !$store.sidebar.sidebarOpen && window.innerWidth < 1024 }">
    
    <!-- User Info -->
    <div class="flex items-center px-6 py-4 border-b border-gray-800">
        <img src="{{url('/')}}/uploads/users/{{Auth::user()->image ?? 'default.png'}}" alt="{{ Auth::user()->name }}" class="h-10 w-10 rounded-full object-cover">
        <div class="ml-3">
            <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
            <p class="text-xs text-gray-400">{{ $SiteSettings->location ?? 'Location' }}</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-2 px-3 pb-4">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{url('/')}}/admin/home" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors {{ request()->is('admin/home') || request()->is('admin/') ? 'bg-gray-800 text-white' : '' }}">
                <i class="fa fa-home mr-3 w-5"></i> Dashboard
            </a>

            <!-- Visit Website -->
            <a href="{{url('/')}}/" target="_blank" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fa fa-globe mr-3 w-5"></i> Visit Website
            </a>

            <!-- Home Page Slider -->
            <div>
                <button @click="toggle('slider')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-file-image-o mr-3 w-5"></i> Home Page Slider
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('slider') }"></i>
                </button>
                <div x-show="isOpen('slider')" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/sliders" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Sliders</a>
                    <a href="{{url('/')}}/admin/addSlider" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add Slider</a>
                </div>
            </div>

            <!-- Banners -->
            <div>
                <button @click="toggle('banners')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-file-image-o mr-3 w-5"></i> Banners
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('banners') }"></i>
                </button>
                <div x-show="isOpen('banners')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/banners" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Banners</a>
                </div>
            </div>

            <!-- Products -->
            <div>
                <button @click="toggle('products')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-shopping-cart mr-3 w-5"></i> Products
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('products') }"></i>
                </button>
                <div x-show="isOpen('products')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/products" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Products</a>
                    <a href="{{url('/')}}/admin/addProduct" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add Product</a>
                </div>
            </div>

            <!-- Categories -->
            <div>
                <button @click="toggle('categories')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-folder mr-3 w-5"></i> Categories
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('categories') }"></i>
                </button>
                <div x-show="isOpen('categories')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/categories" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Categories</a>
                    <a href="{{url('/')}}/admin/addCategory" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add Category</a>
                </div>
            </div>

            <!-- Brands -->
            <div>
                <button @click="toggle('brands')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-folder mr-3 w-5"></i> Brands
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('brands') }"></i>
                </button>
                <div x-show="isOpen('brands')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/brands" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Brands</a>
                    <a href="{{url('/')}}/admin/addBrand" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add Brand</a>
                </div>
            </div>

            <!-- Testimonials -->
            <div>
                <button @click="toggle('testimonials')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-comment mr-3 w-5"></i> Testimonials
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('testimonials') }"></i>
                </button>
                <div x-show="isOpen('testimonials')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/testimonials" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Testimonials</a>
                    <a href="{{url('/')}}/admin/addTestimonial" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add Testimonial</a>
                </div>
            </div>

            <!-- Payments -->
            <div>
                <button @click="toggle('payments')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-ticket mr-3 w-5"></i> Payments
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('payments') }"></i>
                </button>
                <div x-show="isOpen('payments')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <div>
                        <button @click.stop="toggle('mpesa')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">
                            <span class="flex items-center">
                                <i class="fa fa-money mr-3 w-5"></i> M-PESA API
                            </span>
                            <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('mpesa') }"></i>
                        </button>
                        <div x-show="isOpen('mpesa')" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             x-cloak
                             class="ml-4 mt-1 space-y-1">
                            <a href="{{url('/')}}/admin/b2b" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">B2B Transfers</a>
                            <a href="{{url('/')}}/admin/b2c" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">B2C Transfers</a>
                            <a href="{{url('/')}}/admin/lnmo_api_response" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">STK Transactions</a>
                            <a href="{{url('/')}}/admin/mobile_payments" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">C2B Transactions</a>
                            <a href="{{url('/')}}/admin/reverse_transaction" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">Reversed Transactions</a>
                            <a href="{{url('/')}}/admin/transaction_status" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">Transaction Statuses</a>
                            <a href="{{url('/')}}/admin/accountbalance" class="block px-3 py-2 text-sm rounded-lg text-gray-500 hover:bg-gray-800 hover:text-white transition-colors">Account Balance</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Users -->
            <div>
                <button @click="toggle('users')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-user mr-3 w-5"></i> System Users
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('users') }"></i>
                </button>
                <div x-show="isOpen('users')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/users" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Manage Users</a>
                    <a href="{{url('/')}}/admin/addUser" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add User</a>
                    <a href="{{url('/')}}/admin/admins" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Manage Admins</a>
                </div>
            </div>

            <!-- Information Center -->
            <div>
                <button @click="toggle('info')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-info mr-3 w-5"></i> Information Center
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('info') }"></i>
                </button>
                <div x-show="isOpen('info')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/faq" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">FAQ</a>
                    <a href="{{url('/')}}/admin/how" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">How It Works</a>
                </div>
            </div>

            <!-- Legal Pages -->
            <div>
                <button @click="toggle('legal')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-gavel mr-3 w-5"></i> Legal Pages
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('legal') }"></i>
                </button>
                <div x-show="isOpen('legal')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/editAbout" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">About Us</a>
                    <a href="{{url('/')}}/admin/editRisk" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Order & Delivery</a>
                    <a href="{{url('/')}}/admin/privacy" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="{{url('/')}}/admin/terms" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Terms & Conditions</a>
                    <a href="{{url('/')}}/admin/editCopyright" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Copyright</a>
                </div>
            </div>

            <!-- Blog & Articles -->
            <div>
                <button @click="toggle('blog')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-rss mr-3 w-5"></i> Blog & Articles
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('blog') }"></i>
                </button>
                <div x-show="isOpen('blog')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/blog" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">All Blogs</a>
                    <a href="{{url('/')}}/admin/addBlog" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Add Blog</a>
                </div>
            </div>

            <!-- Logo & Favicon -->
            <a href="{{url('/')}}/admin/logo-and-favicon" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fa fa-info mr-3 w-5"></i> Logo & Favicon
            </a>

            <!-- Site Settings -->
            <div>
                <button @click="toggle('settings')" type="button" class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                    <span class="flex items-center">
                        <i class="fa fa-cog mr-3 w-5"></i> Site Settings
                    </span>
                    <i class="fa fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': isOpen('settings') }"></i>
                </button>
                <div x-show="isOpen('settings')" 
                     x-collapse
                     x-cloak
                     class="ml-4 mt-1 space-y-1">
                    <a href="{{url('/')}}/admin/SiteSettings" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">System Settings</a>
                    <a href="{{url('/')}}/admin/mailerSettings" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Mailer Settings</a>
                    <a href="{{url('/')}}/admin/credentials" class="block px-3 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">Credentials</a>
                </div>
            </div>

            <!-- Social Media -->
            <a href="{{url('/')}}/admin/SocialMediaSettings" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fa fa-plus-square-o mr-3 w-5"></i> Social Media
            </a>

            <!-- Logout -->
            <a href="{{url('/')}}/logout" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-red-400 hover:bg-gray-800 hover:text-red-300 transition-colors">
                <i class="fa fa-sign-out mr-3 w-5"></i> Logout
            </a>
        </div>
    </nav>
</div>

<script>
function sidebarMenu() {
    return {
        openMenus: {},
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
