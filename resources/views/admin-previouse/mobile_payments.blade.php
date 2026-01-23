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
                <span class="text-gray-900 font-medium">C2B Payments</span>
            </li>
            <li class="ml-auto flex items-center space-x-2">
                <a href="{{url('/')}}/admin/accountbalance" class="text-sm text-blue-600 hover:text-blue-800">Account Balance</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/b2b" class="text-sm text-blue-600 hover:text-blue-800">B2B</a>
                <span class="text-gray-300">|</span>
                <a href="{{url('/')}}/admin/b2c" class="text-sm text-blue-600 hover:text-blue-800">B2C</a>
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
    <h2 class="text-2xl font-bold text-gray-900">Customer to Business (C2B) Payments</h2>
    <p class="text-sm text-gray-500 mt-1">Manage all C2B payment transactions</p>
</div>

<!-- C2B Payments Table -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">C2B Transactions</h3>
                <p class="text-sm text-gray-500 mt-1">All customer to business payment records</p>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="overflow-x-auto">
            <x-admin.table :headers="['Transaction Details', 'Payment Details', 'Timestamps', 'Status & Actions']">
                @forelse($C2B as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm">
                        <div class="space-y-1">
                            <div><span class="font-medium text-gray-700">Transaction ID:</span> <span class="text-gray-900">{{$item->transLoID}}</span></div>
                            <div><span class="font-medium text-gray-700">Type:</span> <span class="text-gray-600">{{$item->TransactionType}}</span></div>
                            <div><span class="font-medium text-gray-700">Trans ID:</span> <span class="text-gray-600">{{$item->TransID}}</span></div>
                            <div><span class="font-medium text-gray-700">Bill Ref:</span> <span class="text-gray-600">{{$item->BillRefNumber}}</span></div>
                            <div><span class="font-medium text-gray-700">Invoice:</span> <span class="text-gray-600">{{$item->InvoiceNumber}}</span></div>
                            <div><span class="font-medium text-gray-700">Third Party ID:</span> <span class="text-gray-600">{{$item->ThirdPartyTransID}}</span></div>
                            <div class="pt-2 border-t border-gray-200">
                                <div><span class="font-medium text-gray-700">Phone:</span> <span class="text-gray-900">{{$item->MSISDN}}</span></div>
                                <div><span class="font-medium text-gray-700">Name:</span> <span class="text-gray-900">{{$item->FirstName}} {{$item->MiddleName}} {{$item->LastName}}</span></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <div class="space-y-1">
                            <div><span class="font-medium text-gray-700">Amount:</span> <span class="text-lg font-bold text-green-600">KES {{number_format($item->TransAmount, 2)}}</span></div>
                            <div><span class="font-medium text-gray-700">Business Code:</span> <span class="text-gray-600">{{$item->BusinessShortCode}}</span></div>
                            <div><span class="font-medium text-gray-700">Account Balance:</span> <span class="text-gray-600">KES {{number_format($item->OrgAccountBalance, 2)}}</span></div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="space-y-1">
                            <div><span class="font-medium">Transaction Time:</span><br>{{$item->TransTime}}</div>
                            <div class="pt-2"><span class="font-medium">Last Update:</span><br>{{$item->lastUpdate}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-col items-start space-y-2">
                            @if($item->status == 1)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fa fa-check-circle mr-1"></i> Approved
                                </span>
                                <a href="{{url('/')}}/admin/approve-transaction/{{$item->transLoID}}" 
                                   onclick="return confirm('Are you sure you want to un-approve this transaction?')"
                                   class="inline-flex items-center px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fa fa-times mr-1"></i> Un-approve
                                </a>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fa fa-clock-o mr-1"></i> Pending
                                </span>
                                <a href="{{url('/')}}/admin/approve-transaction/{{$item->transLoID}}" 
                                   onclick="return confirm('Are you sure you want to approve this transaction?')"
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md text-xs font-medium text-white bg-green-600 hover:bg-green-700">
                                    <i class="fa fa-check mr-1"></i> Approve
                                </a>
                            @endif
                            <div x-data="{ 
                                confirmDelete() {
                                    if (confirm('Are you sure you want to delete this transaction? Once deleted, you will not be able to recover this data!')) {
                                        fetch('{{url('/')}}/admin/deleteC2BAjax', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                            },
                                            body: JSON.stringify({ id: {{ $item->transLoID }} })
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
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                        <div class="py-8">
                            <i class="fa fa-credit-card text-4xl text-gray-300 mb-2"></i>
                            <p>No C2B transactions found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>
</div>

@endsection
