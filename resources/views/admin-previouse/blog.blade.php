@extends('admin.master')

@section('content')
<!-- Breadcrumbs -->
<div class="mb-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{url('/')}}/admin/home" class="text-gray-400 hover:text-gray-500">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Blog</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/addBlog" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fa fa-pencil mr-2"></i> Add Blog Post
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">All Blog Posts</h2>
</div>

<!-- Blog Posts Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Blog Posts</h3>
                <p class="text-sm text-gray-500 mt-1">Manage your blog articles</p>
            </div>
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition
                     x-cloak
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-10"
                     style="display: none;">
                    <div class="py-1">
                        <button 
                            type="button"
                            @click="$dispatch('open-modal', { name: 'addCategory' }); open = false"
                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        >
                            <i class="fa fa-plus mr-2"></i> Add New Category
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['#', 'Title', 'Category & Tags', 'Date', 'Edit', 'Delete']">
                @forelse($Blog as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <a href="{{url('/')}}/blogs/{{$item->slung}}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">
                            {{ $item->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        @php $Category = DB::table('categories')->where('id', $item->category)->first(); @endphp
                        @if($Category)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $Category->title }}
                            </span>
                        @else
                            <span class="text-gray-400">No category</span>
                        @endif
                        @if($item->tags)
                        <div class="mt-1 text-xs text-gray-400">
                            Tags: {{ $item->tags }}
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @php
                            $RawDate = $item->created_at;
                            $FormatDate = strtotime($RawDate);
                            $Month = date('M', $FormatDate);
                            $Date = date('D', $FormatDate);
                            $date = date('d', $FormatDate);
                            $Year = date('Y', $FormatDate);
                        @endphp
                        {{$Date}}, {{$date}} {{$Month}}, {{$Year}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{url('/')}}/admin/editBlog/{{$item->id}}" class="text-blue-600 hover:text-blue-900">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure? Once deleted, you will not be able to recover this blog post!')) {
                                    fetch('{{url('/')}}/admin/deleteBlogAjax', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                        },
                                        body: JSON.stringify({ id: {{ $item->id }} })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Blog post deleted successfully!');
                                            setTimeout(() => location.reload(), 1000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while deleting the blog post.');
                                    });
                                }
                            }
                        }">
                            <button @click="confirmDelete()" class="text-red-600 hover:text-red-900">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-rss text-4xl text-gray-300 mb-2"></i>
                            <p>No blog posts found</p>
                            <a href="{{url('/')}}/admin/addBlog" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fa fa-plus mr-2"></i> Add Your First Blog Post
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<x-admin.modal name="addCategory" title="Add New Category" size="md">
    <form id="categoryAddForm" x-data="{ loading: false, success: false }">
        @csrf
        <x-admin.form.input 
            name="title" 
            label="Category Name" 
            id="CategoryTitle"
            placeholder="Enter category name"
        />
        
        <div x-show="loading" class="mb-4">
            <div class="flex items-center justify-center">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <span class="ml-2 text-sm text-gray-600">Adding category...</span>
            </div>
        </div>
        
        <div x-show="success" class="mb-4">
            <x-admin.alert type="success">Category Added Successfully! Refreshing page...</x-admin.alert>
        </div>
        
        <div class="flex justify-end space-x-3 mt-6">
            <button 
                type="button" 
                @click="$dispatch('close-modal', { name: 'addCategory' })" 
                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </button>
            <button 
                type="submit" 
                @click.prevent="
                    loading = true;
                    fetch('{{url('/')}}/admin/addCategoryAjaxRequest', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({ title: document.getElementById('CategoryTitle').value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        loading = false;
                        if (data.success) {
                            success = true;
                            document.getElementById('categoryAddForm').reset();
                            setTimeout(() => {
                                $dispatch('close-modal', { name: 'addCategory' });
                                location.reload();
                            }, 2000);
                        }
                    });
                "
                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700"
            >
                Submit
            </button>
        </div>
    </form>
</x-admin.modal>

@endsection
