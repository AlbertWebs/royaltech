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
                <a href="{{url('/')}}/admin/SiteSettings" class="text-gray-400 hover:text-indigo-600">Site Settings</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Terms & Conditions</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Terms & Conditions</h2>
        <p class="text-gray-600 mt-1">Manage your terms and conditions pages</p>
    </div>
    <a href="{{url('/')}}/admin/addTerms" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New Terms
    </a>
</div>

<!-- Terms & Conditions List -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">All Terms & Conditions</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Terms) }} term(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        @forelse($Terms as $item)
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 shadow-md hover:shadow-xl transition-all duration-300 mb-4 group overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center mb-3">
                            <div class="bg-indigo-100 rounded-lg p-2 mr-3">
                                <i class="fa fa-file-text text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                    {{ $item->title }}
                                </h3>
                                <div class="flex items-center mt-1 space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fa fa-calendar mr-1.5"></i>
                                        @php 
                                            $RawDate = $item->created_at;
                                            $FormatDate = strtotime($RawDate);
                                            $Month = date('M', $FormatDate);
                                            $Date = date('D', $FormatDate);
                                            $date = date('d', $FormatDate);
                                            $Year = date('Y', $FormatDate);
                                        @endphp
                                        {{ $Date }}, {{ $date }} {{ $Month }}, {{ $Year }}
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fa fa-hashtag mr-1.5"></i>
                                        ID: {{ $item->id }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        @if($item->content)
                        <div class="mt-4 pl-14">
                            <p class="text-gray-600 text-sm line-clamp-2">
                                {{ strip_tags(Str::limit($item->content, 150)) }}
                            </p>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-2 ml-4">
                        <a href="{{url('/')}}/admin/editTerm/{{$item->id}}" 
                           class="inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-600 rounded-lg text-sm font-semibold hover:bg-indigo-100 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all"
                           title="Edit Terms">
                            <i class="fa fa-pencil mr-2"></i> Edit
                        </a>
                        <button onclick="deleteTerm({{$item->id}})" 
                                class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-semibold hover:bg-red-100 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all"
                                title="Delete Terms">
                            <i class="fa fa-trash mr-2"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
                <i class="fa fa-file-text text-gray-400 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Terms & Conditions</h3>
            <p class="text-gray-600 mb-6">Get started by creating your first terms and conditions page</p>
            <a href="{{url('/')}}/admin/addTerms" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-plus mr-2"></i> Add First Terms
            </a>
        </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteTerm(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Create form data
            const formData = new FormData();
            formData.append('id', id);
            formData.append('_token', document.querySelector('meta[name=csrf-token]').content);

            // Make AJAX request
            fetch('{{url('/')}}/admin/deleteTermsAjax', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Terms & Conditions has been deleted.',
                    icon: 'success',
                    confirmButtonColor: '#6366f1'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.',
                    icon: 'error',
                    confirmButtonColor: '#6366f1'
                });
            });
        }
    });
}
</script>

@endsection
