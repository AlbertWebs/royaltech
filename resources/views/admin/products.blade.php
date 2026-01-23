@extends('admin.master')

@section('content')
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
                <span class="text-gray-900 font-medium">Products</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Products</h2>
        <p class="text-gray-600 mt-1">Manage your product catalog</p>
    </div>
    <a href="{{url('/')}}/admin/addProduct" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Product
    </a>
</div>

<!-- Products Grid -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Products</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Product) }} product(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($Product as $item)
            <div class="bg-white rounded-xl border border-gray-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                <!-- Product Image Section -->
                <div class="relative h-64 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if($item->image_one && $item->image_one != '0')
                    <img src="{{url('/')}}/uploads/products/{{$item->image_one}}" 
                         alt="{{ $item->name }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="text-center">
                            <div class="bg-white/80 backdrop-blur-sm rounded-full p-6 mb-3 inline-block">
                                <i class="fa fa-image text-gray-400 text-5xl"></i>
                            </div>
                            <p class="text-gray-500 text-sm font-medium">No Image</p>
                        </div>
                    </div>
                    @endif
                    <!-- Stock Badge -->
                    @if($item->stock)
                    <div class="absolute top-3 right-3">
                        @if($item->stock == 'In Stock')
                        <span class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                            <i class="fa fa-check-circle mr-1"></i> In Stock
                        </span>
                        @else
                        <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                            <i class="fa fa-times-circle mr-1"></i> Out of Stock
                        </span>
                        @endif
                    </div>
                    @endif
                    <!-- ID Badge -->
                    <div class="absolute top-3 left-3 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                        #{{ $item->id }}
                    </div>
                </div>
                
                <!-- Product Content -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        <a href="{{url('/')}}/e-commerce/product/{{$item->slung}}" target="_blank" class="hover:underline">
                            {{ $item->name }}
                        </a>
                    </h3>
                    
                    @php $Category = DB::table('categories')->where('id', $item->category)->first(); @endphp
                    @php $Brand = DB::table('brands')->where('id', $item->brand)->first(); @endphp
                    
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        @if($Category)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800 border border-indigo-200">
                            <i class="fa fa-folder mr-1.5"></i>{{ $Category->title }}
                        </span>
                        @endif
                        @if($Brand)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800 border border-purple-200">
                            <i class="fa fa-tag mr-1.5"></i>{{ $Brand->title }}
                        </span>
                        @endif
                    </div>
                    
                    @if($item->price)
                    <div class="mb-4 p-3 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg border border-indigo-200">
                        <div class="flex items-baseline">
                            <span class="text-xs text-gray-500 font-medium mr-2">Price:</span>
                            <span class="text-2xl font-bold text-indigo-600">KSh {{ number_format($item->price) }}</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($item->pro_condition)
                    <div class="mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">
                            <i class="fa fa-info-circle mr-1.5"></i>Condition: {{ $item->pro_condition }}
                        </span>
                    </div>
                    @endif
                </div>
                
                <!-- Actions Section with Background -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <a href="{{url('/')}}/e-commerce/product/{{$item->slung}}" target="_blank" 
                           class="text-sm text-indigo-600 hover:text-indigo-700 font-medium inline-flex items-center">
                            <i class="fa fa-external-link mr-1.5"></i> View Product
                        </a>
                        <div class="flex items-center space-x-2">
                            <a href="{{url('/')}}/admin/editProducts/{{$item->id}}" 
                               class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-md hover:shadow-lg">
                                <i class="fa fa-pencil mr-2"></i> Edit
                            </a>
                            <button 
                                x-data="{ 
                                    confirmDelete() {
                                        if (confirm('Are you sure? Once deleted, you will not be able to recover this product!')) {
                                            window.location.href = '{{url('/')}}/admin/deleteProduct/{{$item->id}}';
                                        }
                                    }
                                }"
                                @click="confirmDelete()"
                                class="inline-flex items-center px-5 py-2.5 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all shadow-md hover:shadow-lg">
                                <i class="fa fa-trash mr-2"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <i class="fa fa-shopping-cart text-gray-400 text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No Products Found</h3>
                <p class="text-gray-600 mb-8 text-lg">Get started by adding your first product</p>
                <a href="{{url('/')}}/admin/addProduct" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl text-base font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                    <i class="fa fa-plus mr-2"></i> Add Your First Product
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
