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
                <span class="text-gray-900 font-medium">Blog & Articles</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Blog Posts</h2>
        <p class="text-gray-600 mt-1">Manage your blog articles</p>
    </div>
    <a href="{{url('/')}}/admin/addBlog" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Blog Post
    </a>
</div>

<!-- Blog Posts Grid -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Blog Posts</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Blog) }} post(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        @forelse($Blog as $item)
        <div class="mb-4 last:mb-0 bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200 p-6">
            <div class="flex items-start space-x-6">
                <div class="flex-shrink-0">
                    @if($item->placeholder && $item->placeholder != '0')
                    <img src="{{url('/')}}/uploads/blogs/{{$item->placeholder}}" 
                         alt="{{ $item->title }}" 
                         class="h-24 w-24 rounded-xl object-cover border-2 border-gray-200 shadow-sm">
                    @else
                    <div class="h-24 w-24 rounded-xl border-2 border-gray-200 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center shadow-sm">
                        <div class="text-center">
                            <i class="fa fa-image text-gray-400 text-xl mb-1"></i>
                            <p class="text-xs text-gray-500">No Image</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                <a href="{{url('/')}}/blogs/{{$item->slung}}" target="_blank" class="hover:text-indigo-600">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            @if($item->content)
                            <p class="text-sm text-gray-600 mt-2 line-clamp-2">{!! strip_tags($item->content) !!}</p>
                            @endif
                            <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                                <span><i class="fa fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>
                                @php $Category = DB::table('categories')->where('id', $item->category)->first(); @endphp
                                @if($Category)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    {{ $Category->title }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 ml-4">
                            <a href="{{url('/')}}/admin/editBlog/{{$item->id}}" 
                               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                <i class="fa fa-pencil mr-2"></i> Edit
                            </a>
                            <button 
                                x-data="{ 
                                    confirmDelete() {
                                        if (confirm('Are you sure? Once deleted, you will not be able to recover this blog post!')) {
                                            window.location.href = '{{url('/')}}/admin/deleteBlog/{{$item->id}}';
                                        }
                                    }
                                }"
                                @click="confirmDelete()"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                <i class="fa fa-trash mr-2"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-16">
            <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4">
                <i class="fa fa-rss text-gray-400 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Blog Posts Found</h3>
            <p class="text-gray-600 mb-6">Get started by adding your first blog post</p>
            <a href="{{url('/')}}/admin/addBlog" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-plus mr-2"></i> Add Your First Blog Post
            </a>
        </div>
        @endforelse
    </div>
</div>

@endsection
