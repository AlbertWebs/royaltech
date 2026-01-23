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
                <span class="text-gray-900 font-medium">Home Page Sliders</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Sliders</h2>
        <p class="text-gray-600 mt-1">Manage your homepage slider content</p>
    </div>
    <a href="{{url('/')}}/admin/addSlider" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Slider
    </a>
</div>

<!-- Sliders Grid -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Sliders</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Slider) }} slider(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($Slider as $item)
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group" x-data="{ showDetails: false }">
                <!-- Image Section -->
                <div class="relative h-56 bg-gradient-to-br from-indigo-100 to-purple-100 overflow-hidden">
                    @if($item->image)
                    <img src="{{url('/')}}/uploads/slider/{{$item->image}}" 
                         alt="Slider Image" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="text-center">
                            <div class="bg-white/80 backdrop-blur-sm rounded-full p-6 mb-3 inline-block">
                                <i class="fa fa-image text-indigo-500 text-4xl"></i>
                            </div>
                            <p class="text-gray-500 text-sm font-medium">No Image</p>
                        </div>
                    </div>
                    @endif
                    <!-- ID Badge -->
                    <div class="absolute top-3 left-3 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                        #{{ $item->id }}
                    </div>
                    <!-- Type Badge -->
                    @if($item->type)
                    <div class="absolute top-3 right-3 bg-purple-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                        {{ $item->type }}
                    </div>
                    @endif
                </div>
                
                <!-- Content Section -->
                <div class="p-5">
                    <!-- Name/Title -->
                    @if($item->name)
                    <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        {{ $item->name }}
                    </h3>
                    @endif

                    <!-- Text Content Preview -->
                    <div class="space-y-2 mb-4">
                        @if($item->text1)
                        <div class="text-sm text-gray-700 line-clamp-1">
                            <span class="font-semibold text-gray-500">T1:</span> {!! strip_tags(html_entity_decode($item->text1, ENT_QUOTES, 'UTF-8')) !!}
                        </div>
                        @endif
                        @if($item->text2)
                        <div class="text-sm text-gray-700 line-clamp-1">
                            <span class="font-semibold text-gray-500">T2:</span> {!! strip_tags(html_entity_decode($item->text2, ENT_QUOTES, 'UTF-8')) !!}
                        </div>
                        @endif
                        @if($item->text3)
                        <div class="text-sm text-gray-700 line-clamp-1">
                            <span class="font-semibold text-gray-500">T3:</span> {!! strip_tags(html_entity_decode($item->text3, ENT_QUOTES, 'UTF-8')) !!}
                        </div>
                        @endif
                    </div>

                    <!-- Action Button Preview -->
                    @if($item->action_name)
                    <div class="mb-4 p-2 bg-indigo-50 rounded-lg border border-indigo-200">
                        <div class="flex items-center text-sm">
                            <i class="fa fa-link text-indigo-600 mr-2"></i>
                            <span class="text-indigo-700 font-medium">{{ $item->action_name }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Expandable Details -->
                    <div class="mb-4">
                        <button @click="showDetails = !showDetails" 
                                class="w-full text-left text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center justify-between">
                            <span>
                                <i class="fa fa-info-circle mr-1"></i> 
                                <span x-text="showDetails ? 'Hide Details' : 'Show Details'"></span>
                            </span>
                            <i class="fa fa-chevron-down transition-transform duration-200" :class="{ 'rotate-180': showDetails }"></i>
                        </button>
                        
                        <div x-show="showDetails" 
                             x-collapse
                             x-cloak
                             class="mt-3 pt-3 border-t border-gray-200 space-y-2">
                            @if($item->text4)
                            <div class="text-xs">
                                <span class="font-semibold text-gray-500">Text 4:</span>
                                <div class="text-gray-700 mt-1">{!! html_entity_decode($item->text4, ENT_QUOTES, 'UTF-8') !!}</div>
                            </div>
                            @endif
                            @if($item->text5)
                            <div class="text-xs">
                                <span class="font-semibold text-gray-500">Text 5:</span>
                                <div class="text-gray-700 mt-1">{!! html_entity_decode($item->text5, ENT_QUOTES, 'UTF-8') !!}</div>
                            </div>
                            @endif
                            @if($item->content)
                            <div class="text-xs">
                                <span class="font-semibold text-gray-500">Content:</span>
                                <p class="text-gray-700 mt-1 line-clamp-3">{{ $item->content }}</p>
                            </div>
                            @endif
                            @if($item->action)
                            <div class="text-xs">
                                <span class="font-semibold text-gray-500">Action URL:</span>
                                <a href="{{ $item->action }}" target="_blank" class="text-indigo-600 hover:underline break-all">{{ $item->action }}</a>
                            </div>
                            @endif
                            @if($item->thumbnail)
                            <div class="text-xs">
                                <span class="font-semibold text-gray-500 block mb-1">Thumbnail:</span>
                                <img src="{{url('/')}}/uploads/slider/{{$item->thumbnail}}" 
                                     alt="Thumbnail" 
                                     class="h-16 w-auto object-cover rounded border border-gray-200">
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <a href="{{url('/')}}/admin/editSlider/{{$item->id}}" 
                           class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-sm hover:shadow-md mr-2">
                            <i class="fa fa-pencil mr-2"></i> Edit
                        </a>
                        <button 
                            x-data="{ 
                                confirmDelete() {
                                    if (confirm('Are you sure? Once deleted, you will not be able to recover this slider!')) {
                                        window.location.href = '{{url('/')}}/admin/deleteSlider/{{$item->id}}';
                                    }
                                }
                            }"
                            @click="confirmDelete()"
                            class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all shadow-sm hover:shadow-md">
                            <i class="fa fa-trash mr-2"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <i class="fa fa-image text-gray-400 text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No Sliders Found</h3>
                <p class="text-gray-600 mb-8 text-lg">Get started by adding your first homepage slider</p>
                <a href="{{url('/')}}/admin/addSlider" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl text-base font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                    <i class="fa fa-plus mr-2"></i> Add Your First Slider
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
