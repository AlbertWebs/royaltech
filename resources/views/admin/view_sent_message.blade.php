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
                <a href="{{url('/')}}/admin/sent-messages" class="text-gray-400 hover:text-indigo-600 transition-colors">
                    Sent Messages
                </a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Message #{{ $SentMessage->id }}</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Sent Message #{{ $SentMessage->id }}</h2>
        <p class="text-gray-600 mt-1">View details of this sent message</p>
    </div>
    <a href="{{url('/')}}/admin/sent-messages" 
       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg text-sm font-semibold hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-arrow-left mr-2"></i> Back to List
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Message Details -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Message Content</h3>
            </div>
            <div class="p-6">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 mb-2">Subject</dt>
                        <dd class="text-sm text-gray-900 font-semibold">{{ $SentMessage->subject }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 mb-2">Message</dt>
                        <dd class="text-sm text-gray-900 bg-gray-50 rounded-lg p-4 border border-gray-200 whitespace-pre-wrap">{{ $SentMessage->message }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Email Status -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r {{ $SentMessage->email_sent ? 'from-green-500 to-emerald-500' : 'from-red-500 to-rose-500' }} px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-white">Email Status</h3>
            </div>
            <div class="p-6">
                @if($SentMessage->email_sent)
                    <div class="flex items-center text-green-700">
                        <i class="fa fa-check-circle text-2xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Email Sent Successfully</p>
                            <p class="text-sm text-gray-600 mt-1">Email was delivered successfully</p>
                        </div>
                    </div>
                @else
                    <div class="flex items-start text-red-700">
                        <i class="fa fa-exclamation-triangle text-2xl mr-3 mt-1"></i>
                        <div class="flex-1">
                            <p class="font-semibold">Email Failed to Send</p>
                            @if($SentMessage->email_error)
                                <p class="text-sm text-gray-600 mt-1 bg-red-50 p-3 rounded-lg border border-red-200">
                                    <strong>Error:</strong> {{ $SentMessage->email_error }}
                                </p>
                            @else
                                <p class="text-sm text-gray-600 mt-1">No error details available</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Recipient Information -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-4 border-b border-blue-800">
                <h3 class="text-lg font-semibold text-white">Recipient</h3>
            </div>
            <div class="p-6">
                <dl class="space-y-3">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $SentMessage->to_name ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $SentMessage->to_email }}" class="text-indigo-600 hover:text-indigo-800">
                                {{ $SentMessage->to_email }}
                            </a>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Sender Information -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4 border-b border-purple-800">
                <h3 class="text-lg font-semibold text-white">Sender</h3>
            </div>
            <div class="p-6">
                <dl class="space-y-3">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">Sent By</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $SentMessage->sender->name ?? 'System' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">From Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $SentMessage->from_email ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">From Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $SentMessage->from_name ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Message Info -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                <h3 class="text-lg font-semibold text-white">Message Info</h3>
            </div>
            <div class="p-6">
                <dl class="space-y-3">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">Type</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ ucfirst($SentMessage->message_type) }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">Sent Date</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $SentMessage->created_at->format('F d, Y \a\t g:i A') }}
                        </dd>
                    </div>
                    @if($SentMessage->related_message_id)
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase">Related Message</dt>
                        <dd class="mt-1">
                            <a href="{{url('/')}}/admin/read/{{ $SentMessage->related_message_id }}" 
                               class="text-sm text-indigo-600 hover:text-indigo-800">
                                View Original Message #{{ $SentMessage->related_message_id }}
                            </a>
                        </dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
