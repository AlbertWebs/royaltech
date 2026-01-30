@extends('admin.master')

@section('content')
<div x-data="emailTest()">
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
                    <a href="{{url('/')}}/admin/mailerSettings" class="text-gray-400 hover:text-indigo-600 transition-colors">
                        Mailer Settings
                    </a>
                </li>
                <li>
                    <span class="text-gray-500 mx-2">/</span>
                </li>
                <li>
                    <span class="text-gray-900 font-medium">Test Email</span>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Page Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Email Testing Tool</h2>
        <p class="text-gray-600 mt-1">Test your email configuration by sending a test email</p>
    </div>

    <!-- Success/Error Messages -->
    @if(session('email_test_success') !== null)
    <div x-show="showMessage" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         class="mb-6 rounded-xl shadow-lg overflow-hidden {{ session('email_test_success') ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200' }}">
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    @if(session('email_test_success'))
                        <i class="fa fa-check-circle text-2xl text-green-600"></i>
                    @else
                        <i class="fa fa-exclamation-circle text-2xl text-red-600"></i>
                    @endif
                </div>
                <div class="ml-3 flex-1">
                    <h3 class="text-sm font-semibold {{ session('email_test_success') ? 'text-green-800' : 'text-red-800' }}">
                        {{ session('email_test_message') }}
                    </h3>
                    @if(session('email_test_error'))
                        <div class="mt-2 text-sm text-red-700 bg-red-100 p-3 rounded-lg border border-red-200">
                            <strong>Error Details:</strong>
                            <pre class="mt-1 whitespace-pre-wrap text-xs">{{ session('email_test_error') }}</pre>
                        </div>
                    @endif
                </div>
                <div class="ml-4 flex-shrink-0">
                    <button @click="showMessage = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Test Email Form -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
                    <h3 class="text-lg font-semibold text-white">Send Test Email</h3>
                </div>
                <div class="p-6">
                    <form action="{{url('/')}}/admin/send-test-email" method="POST" @submit.prevent="sendTestEmail($event)">
                        @csrf
                        <div class="space-y-6">
                            <!-- To Email -->
                            <div>
                                <label for="to_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fa fa-envelope mr-2 text-indigo-600"></i> To Email Address
                                </label>
                                <input type="email" 
                                       id="to_email" 
                                       name="to_email" 
                                       value="{{ old('to_email', $SiteSettings->email_one ?? '') }}"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm px-4 py-3 h-12"
                                       placeholder="recipient@example.com">
                                <p class="mt-1 text-xs text-gray-500">Enter the email address where you want to receive the test email</p>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fa fa-tag mr-2 text-indigo-600"></i> Subject
                                </label>
                                <input type="text" 
                                       id="subject" 
                                       name="subject" 
                                       value="{{ old('subject', 'Test Email from RoyalTech Admin Panel') }}"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm px-4 py-3 h-12"
                                       placeholder="Test Email Subject">
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fa fa-comment mr-2 text-indigo-600"></i> Message
                                </label>
                                <textarea id="message" 
                                          name="message" 
                                          rows="8"
                                          required
                                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm px-4 py-3"
                                          placeholder="Enter your test message here...">{{ old('message', 'This is a test email from the RoyalTech Admin Panel. If you receive this email, your email configuration is working correctly!') }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <button type="submit" 
                                        :disabled="sending"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                                    <i class="fa fa-paper-plane mr-2" :class="{ 'fa-spin': sending }"></i>
                                    <span x-text="sending ? 'Sending...' : 'Send Test Email'"></span>
                                </button>
                                <button type="button" 
                                        @click="fillSampleData()"
                                        class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                                    <i class="fa fa-magic mr-2"></i> Fill Sample Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Email Configuration Info -->
        <div class="space-y-6">
            <!-- Current Configuration -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-4 border-b border-blue-800">
                    <h3 class="text-lg font-semibold text-white">Email Configuration</h3>
                </div>
                <div class="p-6">
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase">Mail Driver</dt>
                            <dd class="mt-1 text-sm font-semibold text-gray-900">{{ config('mail.default', 'smtp') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase">From Address</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ config('mail.from.address', 'Not configured') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase">From Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ config('mail.from.name', 'Not configured') }}</dd>
                        </div>
                        @if(config('mail.default') === 'smtp')
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase">SMTP Host</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ config('mail.mailers.smtp.host', 'Not configured') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase">SMTP Port</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ config('mail.mailers.smtp.port', 'Not configured') }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>

            <!-- Instructions -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-yellow-500 to-orange-500 px-6 py-4 border-b border-yellow-600">
                    <h3 class="text-lg font-semibold text-white">Instructions</h3>
                </div>
                <div class="p-6">
                    <ol class="space-y-3 text-sm text-gray-700">
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-semibold mr-3">1</span>
                            <span>Enter your email address in the "To Email" field</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-semibold mr-3">2</span>
                            <span>Customize the subject and message (or use sample data)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-semibold mr-3">3</span>
                            <span>Click "Send Test Email"</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-semibold mr-3">4</span>
                            <span>Check your inbox and spam folder</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Troubleshooting -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-red-500 to-pink-500 px-6 py-4 border-b border-red-600">
                    <h3 class="text-lg font-semibold text-white">Troubleshooting</h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <i class="fa fa-check-circle text-red-500 mr-2 mt-0.5"></i>
                            <span>Check Laravel logs: <code class="bg-gray-100 px-1 rounded">storage/logs/laravel.log</code></span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa fa-check-circle text-red-500 mr-2 mt-0.5"></i>
                            <span>Verify SMTP credentials in <code class="bg-gray-100 px-1 rounded">.env</code></span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa fa-check-circle text-red-500 mr-2 mt-0.5"></i>
                            <span>Check firewall/port restrictions</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa fa-check-circle text-red-500 mr-2 mt-0.5"></i>
                            <span>Ensure email server is accessible</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function emailTest() {
    return {
        sending: false,
        showMessage: true,
        
        sendTestEmail(event) {
            this.sending = true;
            const form = event.target;
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    return response.json();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.sending = false;
            });
        },
        
        fillSampleData() {
            document.getElementById('to_email').value = '{{ $SiteSettings->email_one ?? "your-email@example.com" }}';
            document.getElementById('subject').value = 'Test Email from RoyalTech Admin Panel';
            document.getElementById('message').value = 'This is a test email from the RoyalTech Admin Panel.\n\nIf you receive this email, your email configuration is working correctly!\n\nTimestamp: ' + new Date().toLocaleString();
        }
    }
}
</script>
@endsection
