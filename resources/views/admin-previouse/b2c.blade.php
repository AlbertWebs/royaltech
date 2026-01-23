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
                <span class="text-gray-900 font-medium">B2C Transactions</span>
            </li>
            <li class="ml-auto flex items-center space-x-2">
                <a href="{{url('/')}}/admin/lnmo_api_response" class="text-sm text-blue-600 hover:text-blue-800">STK</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/b2b" class="text-sm text-blue-600 hover:text-blue-800">B2B</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/accountbalance" class="text-sm text-blue-600 hover:text-blue-800">Balance</a>
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
    <h2 class="text-2xl font-bold text-gray-900">Business to Customer (B2C) Transactions</h2>
    <p class="text-sm text-gray-500 mt-1">Manage all B2C payment transactions</p>
</div>

<!-- B2C Transactions Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">B2C Transactions</h3>
                <p class="text-sm text-gray-500 mt-1">All business to customer payment records</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['Transaction Details', 'Amount Details', 'Timestamps', 'Actions']">
                @forelse($B2C as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm">
                        <div class="space-y-1">
                            <div><span class="font-medium text-gray-700">B2B Transaction ID:</span> <span class="text-gray-900">{{$item->b2bID}}</span></div>
                            <div><span class="font-medium text-gray-700">Receipt:</span> <span class="text-gray-600">{{$item->TransactionReceipt}}</span></div>
                            <div><span class="font-medium text-gray-700">Receiver:</span> <span class="text-gray-600">{{$item->ReceiverPartyPublicName}}</span></div>
                            <div><span class="font-medium text-gray-700">Registered Customer:</span> <span class="text-gray-600">{{$item->B2CRecipientIsRegisteredCustomer == 1 ? 'Yes' : 'No'}}</span></div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <div class="space-y-1">
                            <div><span class="font-medium text-gray-700">Amount:</span> <span class="text-lg font-bold text-green-600">KES {{number_format($item->TransactionAmount, 2)}}</span></div>
                            <div class="pt-2 border-t border-gray-200 space-y-1">
                                <div><span class="font-medium text-gray-700">Working Account:</span> <span class="text-gray-600">KES {{number_format($item->B2CWorkingAccountAvailableFunds, 2)}}</span></div>
                                <div><span class="font-medium text-gray-700">Utility Account:</span> <span class="text-gray-600">KES {{number_format($item->B2CUtilityAccountAvailableFunds, 2)}}</span></div>
                                <div><span class="font-medium text-gray-700">Charges Paid:</span> <span class="text-gray-600">KES {{number_format($item->B2CChargesPaidAccountAvailableFunds, 2)}}</span></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="space-y-1">
                            <div><span class="font-medium">Completed:</span><br>{{$item->TransactionCompletedDateTime}}</div>
                            <div class="pt-2"><span class="font-medium">Updated:</span><br>{{$item->UpdatedTime}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div x-data="{ 
                            confirmDelete() {
                                if (confirm('Are you sure you want to delete this transaction? Once deleted, you will not be able to recover this data!')) {
                                    fetch('{{url('/')}}/admin/deleteB2CAjax', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                        },
                                        body: JSON.stringify({ id: {{ $item->b2bID }} })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Transaction deleted successfully!');
                                            setTimeout(() => location.reload(), 1000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while deleting the transaction.');
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
                            <i class="fa fa-exchange text-4xl text-gray-300 mb-2"></i>
                            <p>No B2C transactions found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
