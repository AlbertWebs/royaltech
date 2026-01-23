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
                <span class="text-gray-900 font-medium">Brands</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Brands</h2>
        <p class="text-gray-600 mt-1">Manage your product brands</p>
    </div>
    <a href="{{url('/')}}/admin/addBrand" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Brand
    </a>
</div>

<!-- Brands Grid -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Brands</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Brand) }} brand(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($Brand as $item)
            <div class="bg-white rounded-xl border border-gray-200 shadow-md hover:shadow-lg transition-all duration-200 overflow-hidden">
                <!-- Brand Content -->
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        @if($item->image && $item->image != '0')
                        <img src="{{url('/')}}/uploads/brands/{{$item->image}}" 
                             alt="{{ $item->title }}" 
                             class="h-28 w-28 object-contain rounded-xl border-2 border-gray-200 bg-white p-3 shadow-md">
                        @else
                        <div class="h-28 w-28 rounded-xl border-2 border-gray-200 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center shadow-md">
                            <i class="fa fa-tags text-indigo-600 text-4xl"></i>
                        </div>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-2">{{ $item->title }}</h3>
                    <div class="text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            <i class="fa fa-tag mr-1"></i> Brand
                        </span>
                    </div>
                </div>
                
                <!-- Actions Section with Background -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-center space-x-3">
                        <a href="{{url('/')}}/admin/editBrands/{{$item->id}}" 
                           class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-md hover:shadow-lg">
                            <i class="fa fa-pencil mr-2"></i> Edit
                        </a>
                        <button 
                            x-data="{ 
                                confirmDelete() {
                                    if (confirm('Are you sure? Once deleted, you will not be able to recover this brand!')) {
                                        window.location.href = '{{url('/')}}/admin/deleteBrand/{{$item->id}}';
                                    }
                                }
                            }"
                            @click="confirmDelete()"
                            class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all shadow-md hover:shadow-lg">
                            <i class="fa fa-trash mr-2"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4">
                    <i class="fa fa-tags text-gray-400 text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Brands Found</h3>
                <p class="text-gray-600 mb-6">Get started by adding your first brand</p>
                <a href="{{url('/')}}/admin/addBrand" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                    <i class="fa fa-plus mr-2"></i> Add Your First Brand
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
