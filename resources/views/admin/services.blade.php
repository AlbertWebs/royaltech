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
                <span class="text-gray-900 font-medium">Services</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Services</h2>
        <p class="text-gray-600 mt-1">Manage your service offerings</p>
    </div>
    <a href="{{url('/')}}/admin/addservice" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Service
    </a>
</div>

<!-- Services Grid -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Services</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Service) }} service(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($Service as $item)
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                <!-- Image Section -->
                <div class="relative h-48 bg-gradient-to-br from-indigo-100 to-purple-100 overflow-hidden">
                    @if($item->image && $item->image != '0')
                    <img src="{{url('/')}}/uploads/services/{{$item->image}}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="text-center">
                            <div class="bg-white/80 backdrop-blur-sm rounded-full p-6 mb-3 inline-block">
                                <i class="fa fa-cogs text-indigo-500 text-4xl"></i>
                            </div>
                            <p class="text-gray-500 text-sm font-medium">No Image</p>
                        </div>
                    </div>
                    @endif
                    <!-- ID Badge -->
                    <div class="absolute top-3 left-3 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                        ID: {{ $item->id }}
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                        <a href="{{url('/')}}/services/{{$item->slung}}" target="_blank" class="hover:underline">
                            {{ $item->title }}
                        </a>
                    </h3>
                    
                    @if($item->content)
                    <p class="text-sm text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                        {!! strip_tags($item->content) !!}
                    </p>
                    @else
                    <p class="text-sm text-gray-400 italic mb-4">No description available</p>
                    @endif
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <a href="{{url('/')}}/services/{{$item->slung}}" target="_blank" 
                           class="text-sm text-indigo-600 hover:text-indigo-700 font-medium inline-flex items-center">
                            <i class="fa fa-external-link mr-1"></i> View
                        </a>
                        <div class="flex items-center space-x-2">
                            <a href="{{url('/')}}/admin/editService/{{$item->id}}" 
                               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-sm hover:shadow-md">
                                <i class="fa fa-pencil mr-2"></i> Edit
                            </a>
                            <button 
                                x-data="{ 
                                    confirmDelete() {
                                        if (confirm('Are you sure? Once deleted, you will not be able to recover this service!')) {
                                            window.location.href = '{{url('/')}}/admin/deleteservice/{{$item->id}}';
                                        }
                                    }
                                }"
                                @click="confirmDelete()"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all shadow-sm hover:shadow-md">
                                <i class="fa fa-trash mr-2"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <i class="fa fa-cogs text-gray-400 text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No Services Found</h3>
                <p class="text-gray-600 mb-8 text-lg">Get started by adding your first service</p>
                <a href="{{url('/')}}/admin/addservice" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl text-base font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                    <i class="fa fa-plus mr-2"></i> Add Your First Service
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
