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
                <span class="text-gray-900 font-medium">Banners</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/home" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> Dashboard
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">All Banners</h2>
</div>

<!-- Banners Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Banners</h3>
                <p class="text-sm text-gray-500 mt-1">Manage site banners</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['#', 'Name', 'Section', 'Banner', 'Edit']">
                @forelse($Banner as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <div class="font-medium">{{ $item->title }}</div>
                        <div class="mt-1 text-sm text-gray-600">
                            {!! html_entity_decode($item->content) !!}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            {{ $item->section }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{url('/')}}/uploads/banners/{{$item->image}}" alt="{{ $item->title }}" class="h-24 w-32 object-cover rounded-lg border border-gray-200">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{url('/')}}/admin/editBanner/{{$item->id}}" class="text-blue-600 hover:text-blue-900">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-image text-4xl text-gray-300 mb-2"></i>
                            <p>No banners found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
