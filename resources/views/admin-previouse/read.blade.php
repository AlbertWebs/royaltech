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
                <a href="{{url('/')}}/admin/allMessages" class="text-gray-400 hover:text-gray-500">Messages</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">View Message</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/allMessages" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> Back to Messages
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Message Details Card -->
<div class="bg-white shadow rounded-lg mb-6">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Message Details</h3>
                <p class="text-sm text-gray-500 mt-1">View and reply to customer message</p>
            </div>
            <div class="flex items-center space-x-2">
                @if($Message->status == 0)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    <i class="fa fa-envelope mr-1"></i> Unread
                </span>
                @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <i class="fa fa-envelope-open mr-1"></i> Read
                </span>
                @endif
            </div>
        </div>
    </div>
    
    <div class="px-6 py-6">
        <!-- Message Header -->
        <div class="border-b border-gray-200 pb-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">From</label>
                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $Message->name }}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $Message->email }}</p>
                </div>
                @if($Message->phone)
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $Message->phone }}</p>
                </div>
                @endif
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Date</label>
                    <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($Message->created_at)->format('M d, Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Message Subject -->
        <div class="mb-6">
            <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</label>
            <p class="mt-1 text-lg font-semibold text-gray-900">{{ $Message->subject }}</p>
        </div>

        <!-- Message Content -->
        <div class="mb-6">
            <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Message</label>
            <div class="mt-2 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $Message->content }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
            <div class="flex items-center space-x-3">
                <a href="{{url('/')}}/admin/allMessages" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fa fa-arrow-left mr-2"></i> Back to Messages
                </a>
                <div x-data="{ 
                    confirmDelete() {
                        if (confirm('Are you sure you want to delete this message? Once deleted, you will not be able to recover this data!')) {
                            fetch('{{url('/')}}/admin/deleteMessage/{{$Message->id}}', {
                                method: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                }
                            })
                            .then(() => {
                                alert('Message deleted successfully!');
                                window.location.href = '{{url('/')}}/admin/allMessages';
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while deleting the message.');
                            });
                        }
                    }
                }">
                    <button @click="confirmDelete()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                        <i class="fa fa-trash mr-2"></i> Delete Message
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reply Form Card -->
<div class="bg-white shadow rounded-lg" x-data="{ 
    loading: false, 
    success: false,
    submitReply() {
        this.loading = true;
        const form = document.getElementById('replyForm');
        const formData = new FormData(form);
        
        fetch('{{url('/')}}/admin/reply/{{$Message->id}}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            this.loading = false;
            this.success = true;
            form.reset();
            setTimeout(() => {
                this.success = false;
            }, 5000);
        })
        .catch(error => {
            this.loading = false;
            console.error('Error:', error);
            alert('An error occurred while sending the reply.');
        });
    }
}">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Reply to Message</h3>
            <p class="text-sm text-gray-500 mt-1">Send a reply to {{ $Message->name }}</p>
        </div>
    </div>
    
    <form id="replyForm" method="POST" action="{{url('/')}}/admin/reply/{{$Message->id}}" @submit.prevent="submitReply()" class="px-6 py-6">
        @csrf
        
        <input type="hidden" name="name" value="{{ $Message->name }}">
        <input type="hidden" name="email" value="{{ $Message->email }}">
        <input type="hidden" name="id" value="{{ $Message->id }}">
        
        <div class="space-y-6">
            <!-- Subject -->
            <x-admin.form.input 
                name="subject" 
                label="Subject" 
                :value="'Re: ' . $Message->subject"
                placeholder="Enter reply subject"
                required
            />

            <!-- Reply Message -->
            <x-admin.form.textarea 
                name="message" 
                label="Reply Message" 
                rows="6"
                placeholder="Enter your reply message here..."
                required
            />

            <!-- Success Message -->
            <div x-show="success" class="mb-4">
                <x-admin.alert type="success">Reply sent successfully!</x-admin.alert>
            </div>

            <!-- Loading State -->
            <div x-show="loading" class="mb-4">
                <div class="flex items-center justify-center">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                    <span class="ml-2 text-sm text-gray-600">Sending reply...</span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3">
                <a href="{{url('/')}}/admin/allMessages" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <x-admin.button type="submit" variant="primary" :disabled="loading">
                    <i class="fa fa-paper-plane mr-2"></i> Send Reply
                </x-admin.button>
            </div>
        </div>
    </form>
</div>

@endsection
