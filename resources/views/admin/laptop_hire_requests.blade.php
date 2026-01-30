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
                <span class="text-gray-900 font-medium">Laptop Hire Requests</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Laptop Hire Requests</h2>
        <p class="text-gray-600 mt-1">Manage all laptop hire requests from customers</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Requests</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ count($HireRequests) }}</p>
            </div>
            <div class="bg-blue-100 rounded-lg p-3">
                <i class="fa fa-laptop text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Pending</p>
                <p class="text-2xl font-bold text-yellow-600 mt-1">{{ $HireRequests->where('status', 'pending')->count() }}</p>
            </div>
            <div class="bg-yellow-100 rounded-lg p-3">
                <i class="fa fa-clock-o text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Confirmed</p>
                <p class="text-2xl font-bold text-green-600 mt-1">{{ $HireRequests->where('status', 'confirmed')->count() }}</p>
            </div>
            <div class="bg-green-100 rounded-lg p-3">
                <i class="fa fa-check-circle text-green-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Completed</p>
                <p class="text-2xl font-bold text-indigo-600 mt-1">{{ $HireRequests->where('status', 'completed')->count() }}</p>
            </div>
            <div class="bg-indigo-100 rounded-lg p-3">
                <i class="fa fa-check text-indigo-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Requests Table -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">All Requests</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($HireRequests) }} request(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Laptops</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($HireRequests as $request)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $request->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $request->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $request->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $request->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $request->number_of_laptops }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($request->pickup_date)->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'contacted' => 'bg-blue-100 text-blue-800',
                                'confirmed' => 'bg-green-100 text-green-800',
                                'completed' => 'bg-indigo-100 text-indigo-800',
                                'cancelled' => 'bg-red-100 text-red-800'
                            ];
                            $statusColor = $statusColors[$request->status] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColor }}">
                            {{ ucfirst($request->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($request->email_sent ?? false)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800" title="Email sent successfully">
                                <i class="fa fa-check-circle mr-1"></i> Sent
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800" title="{{ $request->email_error ?? 'Email failed to send' }}">
                                <i class="fa fa-exclamation-circle mr-1"></i> Failed
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $request->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{url('/')}}/admin/laptop-hire-request/{{ $request->id }}" 
                           class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fa fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-6 py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fa fa-laptop text-4xl mb-3"></i>
                            <p class="text-lg font-medium">No hire requests yet</p>
                            <p class="text-sm mt-1">Requests from the hire page will appear here</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
