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
                <span class="text-gray-900 font-medium">Users</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Page Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">All Users</h2>
        <p class="text-gray-600 mt-1">Manage your registered users</p>
    </div>
    <a href="{{url('/')}}/admin/addUser" 
       class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
        <i class="fa fa-plus mr-2"></i> Add New User
    </a>
</div>

<!-- Users List -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Registered Users</h3>
                <p class="text-indigo-100 text-sm mt-1">{{ count($Users) }} user(s) total</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        @forelse($Users as $user)
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 shadow-md hover:shadow-xl transition-all duration-300 mb-4 group overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div class="flex items-start flex-1">
                        <!-- User Avatar -->
                        <div class="relative mr-4">
                            @php
                                $userImage = $user->image ?? 'default.png';
                                $imagePath = public_path('uploads/users/' . $userImage);
                                $hasImage = $user->image && $user->image != 'default.png' && file_exists($imagePath);
                            @endphp
                            
                            @if($hasImage)
                                <img src="{{url('/')}}/uploads/users/{{$user->image}}" 
                                     alt="{{ $user->name }}"
                                     class="h-16 w-16 rounded-full object-cover ring-4 ring-indigo-100 group-hover:ring-indigo-200 transition-all"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="h-16 w-16 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 ring-4 ring-indigo-100 group-hover:ring-indigo-200 transition-all flex items-center justify-center text-white font-bold text-xl hidden">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @else
                                <div class="h-16 w-16 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 ring-4 ring-indigo-100 group-hover:ring-indigo-200 transition-all flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="absolute bottom-0 right-0 block h-4 w-4 rounded-full bg-green-500 ring-2 ring-white"></span>
                        </div>
                        
                        <!-- User Info -->
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                    {{ $user->name }}
                                </h3>
                                @if($user->is_admin == 1)
                                <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                    <i class="fa fa-shield mr-1"></i> Admin
                                </span>
                                @else
                                <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                    <i class="fa fa-user mr-1"></i> User
                                </span>
                                @endif
                            </div>
                            
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-3">
                                <span class="flex items-center">
                                    <i class="fa fa-envelope mr-2 text-gray-400"></i>
                                    {{ $user->email }}
                                </span>
                                @if(isset($user->phone) && $user->phone)
                                <span class="flex items-center">
                                    <i class="fa fa-phone mr-2 text-gray-400"></i>
                                    {{ $user->phone }}
                                </span>
                                @endif
                                <span class="flex items-center">
                                    <i class="fa fa-calendar mr-2 text-gray-400"></i>
                                    @php 
                                        $RawDate = $user->created_at;
                                        $FormatDate = strtotime($RawDate);
                                        $Month = date('M', $FormatDate);
                                        $Date = date('d', $FormatDate);
                                        $Year = date('Y', $FormatDate);
                                    @endphp
                                    Joined {{ $Date }} {{ $Month }}, {{ $Year }}
                                </span>
                            </div>
                            
                            @if(isset($user->location) && $user->location)
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fa fa-map-marker mr-2"></i>
                                {{ $user->location }}
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-2 ml-4">
                        <a href="{{url('/')}}/admin/editUser/{{$user->id}}" 
                           class="inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-600 rounded-lg text-sm font-semibold hover:bg-indigo-100 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all"
                           title="Edit User">
                            <i class="fa fa-pencil mr-2"></i> Edit
                        </a>
                        <button onclick="deleteUser({{$user->id}})" 
                                class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-semibold hover:bg-red-100 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all"
                                title="Delete User">
                            <i class="fa fa-trash mr-2"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <div class="bg-gray-100 rounded-full p-6 inline-block mb-4">
                <i class="fa fa-users text-gray-400 text-5xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Users Found</h3>
            <p class="text-gray-600 mb-6">Get started by adding your first user</p>
            <a href="{{url('/')}}/admin/addUser" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-plus mr-2"></i> Add First User
            </a>
        </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteUser(id) {
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
            fetch('{{url('/')}}/admin/deleteUserAjax', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'User has been deleted.',
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
