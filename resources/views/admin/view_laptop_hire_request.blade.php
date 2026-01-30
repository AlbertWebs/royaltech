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
                <a href="{{url('/')}}/admin/laptop-hire-requests" class="text-gray-400 hover:text-indigo-600 transition-colors">
                    Laptop Hire Requests
                </a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Request #{{ $HireRequest->id }}</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Laptop Hire Request #{{ $HireRequest->id }}</h2>
        <p class="text-gray-600 mt-1">View and manage this hire request</p>
    </div>
    <a href="{{url('/')}}/admin/laptop-hire-requests" 
       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg text-sm font-semibold hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-arrow-left mr-2"></i> Back to List
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Customer Information -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Customer Information</h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $HireRequest->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $HireRequest->email }}" class="text-indigo-600 hover:text-indigo-800">
                                {{ $HireRequest->email }}
                            </a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="tel:{{ $HireRequest->phone }}" class="text-indigo-600 hover:text-indigo-800">
                                {{ $HireRequest->phone }}
                            </a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Request Date</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $HireRequest->created_at->format('F d, Y \a\t g:i A') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Request Details -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Request Details</h3>
            </div>
            <div class="p-6">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Number of Laptops</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ $HireRequest->number_of_laptops }} Laptop(s)
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Pick-up/Delivery Date</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <i class="fa fa-calendar mr-2 text-indigo-600"></i>
                            {{ \Carbon\Carbon::parse($HireRequest->pickup_date)->format('l, F d, Y') }}
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 mb-2">Desired Specs/Model</dt>
                        <dd class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-lg p-4 border border-gray-200">
                            {{ $HireRequest->desired_specs }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Email Status -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r {{ ($HireRequest->email_sent ?? false) ? 'from-green-500 to-emerald-500' : 'from-red-500 to-rose-500' }} px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-white">Email Status</h3>
            </div>
            <div class="p-6">
                @if($HireRequest->email_sent ?? false)
                    <div class="flex items-center text-green-700">
                        <i class="fa fa-check-circle text-2xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Email Sent Successfully</p>
                            <p class="text-sm text-gray-600 mt-1">Notification email was delivered</p>
                        </div>
                    </div>
                @else
                    <div class="flex items-start text-red-700">
                        <i class="fa fa-exclamation-triangle text-2xl mr-3 mt-1"></i>
                        <div class="flex-1">
                            <p class="font-semibold">Email Failed to Send</p>
                            @if($HireRequest->email_error)
                                <p class="text-sm text-gray-600 mt-1 bg-red-50 p-3 rounded-lg border border-red-200">
                                    <strong>Error:</strong> {{ $HireRequest->email_error }}
                                </p>
                            @else
                                <p class="text-sm text-gray-600 mt-1">No error details available</p>
                            @endif
                            <p class="text-xs text-gray-500 mt-2">Check Laravel logs for more details</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Admin Notes -->
        @if($HireRequest->admin_notes)
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-500 px-6 py-4 border-b border-yellow-600">
                <h3 class="text-lg font-semibold text-white">Admin Notes</h3>
            </div>
            <div class="p-6">
                <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $HireRequest->admin_notes }}</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Status Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Status</h3>
            </div>
            <div class="p-6">
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
                        'contacted' => 'bg-blue-100 text-blue-800 border-blue-300',
                        'confirmed' => 'bg-green-100 text-green-800 border-green-300',
                        'completed' => 'bg-indigo-100 text-indigo-800 border-indigo-300',
                        'cancelled' => 'bg-red-100 text-red-800 border-red-300'
                    ];
                    $statusColor = $statusColors[$HireRequest->status] ?? 'bg-gray-100 text-gray-800 border-gray-300';
                @endphp
                <div class="text-center">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold border-2 {{ $statusColor }}">
                        {{ ucfirst($HireRequest->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Update Status Form -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Update Status</h3>
            </div>
            <div class="p-6">
                <form action="{{url('/')}}/admin/update-hire-request-status/{{ $HireRequest->id }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                                <option value="pending" {{ $HireRequest->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="contacted" {{ $HireRequest->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="confirmed" {{ $HireRequest->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $HireRequest->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $HireRequest->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div>
                            <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                            <textarea name="admin_notes" id="admin_notes" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm" placeholder="Add any notes about this request...">{{ $HireRequest->admin_notes }}</textarea>
                        </div>
                        <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                            <i class="fa fa-save mr-2"></i> Update Status
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Quick Actions</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="mailto:{{ $HireRequest->email }}?subject=Laptop Hire Request #{{ $HireRequest->id }}" 
                   class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md hover:shadow-lg transition-all">
                    <i class="fa fa-envelope mr-2"></i> Send Email
                </a>
                <a href="tel:{{ $HireRequest->phone }}" 
                   class="w-full inline-flex justify-center items-center px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-semibold hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-md hover:shadow-lg transition-all">
                    <i class="fa fa-phone mr-2"></i> Call Customer
                </a>
            </div>
        </div>
    </div>
</div>

@if(session('message'))
<div x-data="{ show: true }" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    <div class="flex items-center">
        <i class="fa fa-check-circle mr-2"></i>
        <span>{{ session('message') }}</span>
        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">
            <i class="fa fa-times"></i>
        </button>
    </div>
</div>
@endif
@endsection
