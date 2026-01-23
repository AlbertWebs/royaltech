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
                <span class="text-gray-900 font-medium">Testimonials</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/addTestimonial" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fa fa-pencil mr-2"></i> Add Testimonial
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">All Testimonials</h2>
</div>

<!-- Testimonials Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Testimonials</h3>
                <p class="text-sm text-gray-500 mt-1">Manage customer testimonials</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['#', 'Name', 'Content', 'Image', 'Edit', 'Delete']">
                @forelse($Testimonial as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                        @if($item->company)
                        <div class="text-sm text-gray-500">{{ $item->company }}</div>
                        @endif
                        @if($item->position)
                        <div class="text-xs text-gray-400">{{ $item->position }}</div>
                        @endif
                        @if($item->rating)
                        <div class="mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $i <= $item->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="max-w-md">
                            {{ Str::limit(strip_tags($item->content), 100) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->image && $item->image != '0')
                        <img src="{{url('/')}}/uploads/testimonials/{{$item->image}}" alt="{{ $item->name }}" class="h-16 w-16 rounded-full object-cover border-2 border-gray-200">
                        @else
                        <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center">
                            <i class="fa fa-user text-gray-400"></i>
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{url('/')}}/admin/editTestimonial/{{$item->id}}" class="text-blue-600 hover:text-blue-900">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure? Once deleted, you will not be able to recover this testimonial!')) {
                                    fetch('{{url('/')}}/admin/deleteTestimonialAjax', {
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
                                            alert('Testimonial deleted successfully!');
                                            setTimeout(() => location.reload(), 1000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while deleting the testimonial.');
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
                            <i class="fa fa-comment text-4xl text-gray-300 mb-2"></i>
                            <p>No testimonials found</p>
                            <a href="{{url('/')}}/admin/addTestimonial" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fa fa-plus mr-2"></i> Add Your First Testimonial
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
