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
                <span class="text-gray-900 font-medium">Categories</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Categories</h2>
        <p class="text-gray-600 mt-1">Manage your product categories</p>
    </div>
    <a href="{{url('/')}}/admin/addCategory" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Category
    </a>
</div>

<!-- Categories Grid -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Categories</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Category) }} category(ies) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        @forelse($Category as $item)
        <div class="mb-4 last:mb-0 bg-white rounded-xl border border-gray-200 shadow-md hover:shadow-lg transition-all duration-200 overflow-hidden">
            <!-- Main Content Area -->
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        @if($item->image && $item->image != '0')
                        <img src="{{url('/')}}/uploads/categories/{{$item->image}}" 
                             alt="{{ $item->title }}" 
                             class="h-20 w-20 rounded-xl object-cover border-2 border-gray-200 shadow-md">
                        @else
                        <div class="h-20 w-20 rounded-xl border-2 border-gray-200 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center shadow-md">
                            <i class="fa fa-folder text-indigo-600 text-3xl"></i>
                        </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-bold text-gray-900">{{ $item->title }}</h3>
                        @if($item->content)
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">{!! strip_tags($item->content) !!}</p>
                        @endif
                        <p class="text-xs text-gray-400 mt-2">
                            <i class="fa fa-link mr-1"></i>Slug: {{ $item->slung ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Actions Section with Background -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-end space-x-3">
                    <a href="{{url('/')}}/admin/editCategories/{{$item->id}}" 
                       class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-md hover:shadow-lg">
                        <i class="fa fa-pencil mr-2"></i> Edit
                    </a>
                    <button 
                        x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure? Once deleted, you will not be able to recover this category!')) {
                                    window.location.href = '{{url('/')}}/admin/deleteCategory/{{$item->id}}';
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
        @empty
        <div class="text-center py-16">
            <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4">
                <i class="fa fa-folder text-gray-400 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Categories Found</h3>
            <p class="text-gray-600 mb-6">Get started by adding your first category</p>
            <a href="{{url('/')}}/admin/addCategory" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-plus mr-2"></i> Add Your First Category
            </a>
        </div>
        @endforelse
    </div>
</div>

@endsection
