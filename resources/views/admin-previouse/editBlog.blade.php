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
                <a href="{{url('/')}}/admin/blog" class="text-gray-400 hover:text-gray-500">Blog</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit {{ $Blog->title }}</span>
            </li>
            <li class="ml-auto">
                <a href="{{url('/')}}/admin/blog" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    <i class="fa fa-backward mr-1"></i> All Posts
                </a>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Edit Blog Post: {{ $Blog->title }}</h3>
            <p class="text-sm text-gray-500 mt-1">Update blog post content</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Blog/{{$Blog->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Post Title -->
            <x-admin.form.input 
                name="title" 
                label="Post Title" 
                :value="$Blog->title"
                placeholder="Enter post title"
                required
            />

            <!-- Category -->
            <div>
                @php
                    $CategorySelected = DB::table('categories')->where('id', $Blog->category)->first();
                    $categoryOptions = [];
                    foreach($Category as $cat) {
                        $categoryOptions[$cat->id] = $cat->title;
                    }
                @endphp
                <x-admin.form.select 
                    name="category" 
                    label="Choose Category" 
                    :options="$categoryOptions"
                    :value="$Blog->category"
                    placeholder="Select a category"
                    required
                />
                <div class="mt-2">
                    <button 
                        type="button"
                        @click="$dispatch('open-modal', { name: 'addCategory' })"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium"
                    >
                        <i class="fa fa-plus mr-1"></i> Add New Category
                    </button>
                </div>
            </div>

            <!-- Tags -->
            <div>
                @php
                    $selectedTags = $Blog->tags ? explode(',', $Blog->tags) : [];
                @endphp
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">
                    Select Tags <span class="text-red-500">*</span>
                </label>
                <select 
                    name="tags" 
                    id="tags"
                    multiple
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required
                >
                    @php
                        $tagOptions = ['Bitcoin', 'Forex', 'Crypto', 'Stock', 'Currency', 'New York', 'Forbes', 'Educations', 'Events', 'Clubs'];
                    @endphp
                    @foreach($tagOptions as $tag)
                    <option value="{{ $tag }}" {{ in_array($tag, $selectedTags) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                <p class="mt-1 text-sm text-gray-500">Hold Ctrl/Cmd to select multiple tags</p>
            </div>

            <!-- Meta Description -->
            <x-admin.form.textarea 
                name="meta" 
                label="Meta Description" 
                :value="$Blog->meta"
                rows="3"
                placeholder="Enter meta description for SEO"
                required
            />

            <!-- Content (CKEditor) -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-1">
                    Post Content <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    rows="10"
                    required
                >{{ $Blog->content }}</textarea>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor');
                    }
                </script>
            </div>

            <!-- Author -->
            <x-admin.form.input 
                name="author" 
                label="Author Name" 
                :value="Auth::user()->name"
                readonly
                required
            />

            <!-- Blog Images -->
            <div>
                <h4 class="text-sm font-medium text-gray-900 mb-4">Blog Images</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Image One -->
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_one}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image One</label>
                        <div class="mt-1 flex items-center">
                            <label for="image_one" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fa fa-upload mr-2"></i> Choose File
                                </span>
                                <input 
                                    type="file"
                                    name="image_one"
                                    id="image_one"
                                    accept="image/*"
                                    class="sr-only"
                                    @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                                >
                            </label>
                        </div>
                        <div class="mt-2">
                            <img :src="preview" alt="Preview" class="h-32 w-full object-cover rounded-lg border border-gray-200">
                        </div>
                        <input type="hidden" name="image_one_cheat" value="{{$Blog->image_one}}">
                    </div>

                    <!-- Image Two -->
                    @if($Blog->image_two)
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_two}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Two</label>
                        <div class="mt-1 flex items-center">
                            <label for="image_two" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fa fa-upload mr-2"></i> Choose File
                                </span>
                                <input 
                                    type="file"
                                    name="image_two"
                                    id="image_two"
                                    accept="image/*"
                                    class="sr-only"
                                    @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                                >
                            </label>
                        </div>
                        <div class="mt-2">
                            <img :src="preview" alt="Preview" class="h-32 w-full object-cover rounded-lg border border-gray-200">
                        </div>
                        <input type="hidden" name="image_two_cheat" value="{{$Blog->image_two}}">
                    </div>
                    @endif

                    <!-- Image Three -->
                    @if($Blog->image_three)
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_three}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Three</label>
                        <div class="mt-1 flex items-center">
                            <label for="image_three" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fa fa-upload mr-2"></i> Choose File
                                </span>
                                <input 
                                    type="file"
                                    name="image_three"
                                    id="image_three"
                                    accept="image/*"
                                    class="sr-only"
                                    @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                                >
                            </label>
                        </div>
                        <div class="mt-2">
                            <img :src="preview" alt="Preview" class="h-32 w-full object-cover rounded-lg border border-gray-200">
                        </div>
                        <input type="hidden" name="image_three_cheat" value="{{$Blog->image_three}}">
                    </div>
                    @endif

                    <!-- Image Four -->
                    @if($Blog->image_four)
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_four}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Four</label>
                        <div class="mt-1 flex items-center">
                            <label for="image_four" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fa fa-upload mr-2"></i> Choose File
                                </span>
                                <input 
                                    type="file"
                                    name="image_four"
                                    id="image_four"
                                    accept="image/*"
                                    class="sr-only"
                                    @change="fileName = $event.target.files[0]?.name || ''; if ($event.target.files[0]) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL($event.target.files[0]); }"
                                >
                            </label>
                        </div>
                        <div class="mt-2">
                            <img :src="preview" alt="Preview" class="h-32 w-full object-cover rounded-lg border border-gray-200">
                        </div>
                        <input type="hidden" name="image_four_cheat" value="{{$Blog->image_four}}">
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{url('/')}}/admin/blog" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancel
            </a>
            <x-admin.button type="submit" variant="primary">
                <i class="fa fa-save mr-2"></i> Save Changes
            </x-admin.button>
        </div>
    </form>
</div>

<!-- Add Category Modal -->
<x-admin.modal name="addCategory" title="Add New Category" size="md">
    <form id="categoryAddForm" x-data="{ loading: false, success: false }">
        @csrf
        <x-admin.form.input 
            name="title" 
            label="Category Name" 
            id="CategoryTitle"
            placeholder="Enter category name"
        />
        
        <div x-show="loading" class="mb-4">
            <div class="flex items-center justify-center">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <span class="ml-2 text-sm text-gray-600">Adding category...</span>
            </div>
        </div>
        
        <div x-show="success" class="mb-4">
            <x-admin.alert type="success">Category Added Successfully! Refreshing page...</x-admin.alert>
        </div>
        
        <div class="flex justify-end space-x-3 mt-6">
            <button 
                type="button" 
                @click="$dispatch('close-modal', { name: 'addCategory' })" 
                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </button>
            <button 
                type="submit" 
                @click.prevent="
                    loading = true;
                    fetch('{{url('/')}}/admin/addCategoryAjaxRequest', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({ title: document.getElementById('CategoryTitle').value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        loading = false;
                        if (data.success) {
                            success = true;
                            document.getElementById('categoryAddForm').reset();
                            setTimeout(() => {
                                $dispatch('close-modal', { name: 'addCategory' });
                                location.reload();
                            }, 2000);
                        }
                    });
                "
                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700"
            >
                Submit
            </button>
        </div>
    </form>
</x-admin.modal>

@endsection
