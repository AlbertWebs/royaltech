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
                <span class="text-gray-900 font-medium">How It Works</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/addHow" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fa fa-pencil mr-2"></i> Add How It Works
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">How It Works</h2>
</div>

<!-- How It Works Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">How It Works</h3>
                <p class="text-sm text-gray-500 mt-1">Manage how it works content</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['#', 'Title', 'Date', 'Edit', 'Delete']">
                @forelse($How as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                        {{ $item->title }}
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
                        <a href="{{url('/')}}/admin/editHow/{{$item->id}}" class="text-blue-600 hover:text-blue-900">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure? Once deleted, you will not be able to recover this item!')) {
                                    fetch('{{url('/')}}/admin/deleteHowAjax', {
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
                                            alert('Item deleted successfully!');
                                            setTimeout(() => location.reload(), 1000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while deleting the item.');
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
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-info-circle text-4xl text-gray-300 mb-2"></i>
                            <p>No items found</p>
                            <a href="{{url('/')}}/admin/addHow" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fa fa-plus mr-2"></i> Add Your First Item
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
