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
                <span class="text-gray-900 font-medium">Front End Sliders</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/addSlider" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fa fa-pencil mr-2"></i> Add Slider
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">All Sliders</h2>
</div>

<!-- Sliders Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Sliders</h3>
                <p class="text-sm text-gray-500 mt-1">Manage homepage slider content</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['#', 'Content', 'Thumbnail', 'Image', 'Edit', 'Delete']">
                @forelse($Slider as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="space-y-1">
                            @if($item->text1)
                            <div><span class="font-medium">Text1:</span> {!! html_entity_decode($item->text1, ENT_QUOTES, 'UTF-8') !!}</div>
                            @endif
                            @if($item->text2)
                            <div><span class="font-medium">Text2:</span> {!! html_entity_decode($item->text2, ENT_QUOTES, 'UTF-8') !!}</div>
                            @endif
                            @if($item->text3)
                            <div><span class="font-medium">Text3:</span> {!! html_entity_decode($item->text3, ENT_QUOTES, 'UTF-8') !!}</div>
                            @endif
                            @if($item->text4)
                            <div><span class="font-medium">Text4:</span> {!! html_entity_decode($item->text4, ENT_QUOTES, 'UTF-8') !!}</div>
                            @endif
                            @if($item->text5)
                            <div><span class="font-medium">Text5:</span> {!! html_entity_decode($item->text5, ENT_QUOTES, 'UTF-8') !!}</div>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->thumbnail)
                        <img src="{{url('/')}}/uploads/slider/{{$item->thumbnail}}" alt="Thumbnail" class="h-20 w-32 object-cover rounded-lg border border-gray-200">
                        @else
                        <span class="text-gray-400 text-sm">No thumbnail</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->image)
                        <img src="{{url('/')}}/uploads/slider/{{$item->image}}" alt="Slider Image" class="h-20 w-32 object-cover rounded-lg border border-gray-200">
                        @else
                        <span class="text-gray-400 text-sm">No image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{url('/')}}/admin/editSlider/{{$item->id}}" class="text-blue-600 hover:text-blue-900">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure? Once deleted, you will not be able to recover this slider!')) {
                                    fetch('{{url('/')}}/admin/deleteSliderAjax', {
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
                                            alert('Slider deleted successfully!');
                                            setTimeout(() => location.reload(), 1000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while deleting the slider.');
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
                            <i class="fa fa-image text-4xl text-gray-300 mb-2"></i>
                            <p>No sliders found</p>
                            <a href="{{url('/')}}/admin/addSlider" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fa fa-plus mr-2"></i> Add Your First Slider
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
