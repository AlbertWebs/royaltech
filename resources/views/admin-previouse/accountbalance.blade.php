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
                <span class="text-gray-900 font-medium">Account Balance</span>
            </li>
            <li class="ml-auto flex items-center space-x-2">
                <a href="{{url('/')}}/admin/lnmo_api_response" class="text-sm text-blue-600 hover:text-blue-800">STK</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/b2b" class="text-sm text-blue-600 hover:text-blue-800">B2B</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/b2c" class="text-sm text-blue-600 hover:text-blue-800">B2C</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/mobile_payments" class="text-sm text-blue-600 hover:text-blue-800">C2B</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/reverse_transaction" class="text-sm text-blue-600 hover:text-blue-800">Reversed</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/transaction_status" class="text-sm text-blue-600 hover:text-blue-800">Status</a>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Account Balance Requests</h2>
            <p class="text-sm text-gray-500 mt-1">View and manage account balance records</p>
        </div>
        <div x-data="{ loading: false, balance: null }">
            <button 
                @click="
                    loading = true;
                    fetch('{{url('/')}}/api/v1/balanceAjaxResponseChecker', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({ id: 1 })
                    })
                    .then(response => response.text())
                    .then(result => {
                        loading = false;
                        balance = 'KES ' + result;
                    })
                    .catch(error => {
                        loading = false;
                        console.error('Error:', error);
                    });
                "
                :disabled="loading"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <span x-show="!loading">
                    <i class="fa fa-refresh mr-2"></i> Check Balance
                </span>
                <span x-show="loading" class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Checking...
                </span>
            </button>
            <div x-show="balance" x-cloak class="mt-2 text-sm font-semibold text-green-600">
                <i class="fa fa-check-circle mr-1"></i> <span x-text="balance"></span>
            </div>
        </div>
    </div>
</div>

<!-- Account Balance Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Balance Records</h3>
                <p class="text-sm text-gray-500 mt-1">All account balance request records</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['Balance ID', 'Account Details', 'Timestamps', 'Actions']">
                @forelse($Accountbalance as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm">
                        <div class="font-medium text-gray-900">{{$item->accountBalID}}</div>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <div class="space-y-1">
                            <div><span class="font-medium text-gray-700">Working Account:</span> <span class="text-gray-900">KES {{number_format($item->WorkingAccount, 2)}}</span></div>
                            <div><span class="font-medium text-gray-700">Float Account:</span> <span class="text-gray-900">KES {{number_format($item->FloatAccount, 2)}}</span></div>
                            <div><span class="font-medium text-gray-700">Utility Account:</span> <span class="text-gray-900">KES {{number_format($item->UtilityAccount, 2)}}</span></div>
                            <div><span class="font-medium text-gray-700">Charges Paid:</span> <span class="text-gray-900">KES {{number_format($item->ChargesPaidAccount, 2)}}</span></div>
                            <div><span class="font-medium text-gray-700">Settlement Account:</span> <span class="text-gray-900">KES {{number_format($item->OrganizationSettlementAccount, 2)}}</span></div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="space-y-1">
                            <div><span class="font-medium">Completed:</span><br>{{$item->BOCompletedTime}}</div>
                            <div class="pt-2"><span class="font-medium">Updated:</span><br>{{$item->updatedTime}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure you want to delete this balance record? Once deleted, you will not be able to recover this data!')) {
                                    fetch('{{url('/')}}/admin/deleteBalAjax', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                        },
                                        body: JSON.stringify({ id: {{ $item->accountBalID }} })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Balance record deleted successfully!');
                                            setTimeout(() => location.reload(), 1000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while deleting the balance record.');
                                    });
                                }
                            }
                        }">
                            <button @click="confirmDelete()" class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md text-xs font-medium text-white bg-red-600 hover:bg-red-700">
                                <i class="fa fa-trash mr-1"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-balance-scale text-4xl text-gray-300 mb-2"></i>
                            <p>No balance records found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
