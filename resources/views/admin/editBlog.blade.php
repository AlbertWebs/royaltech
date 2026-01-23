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
                <a href="{{url('/')}}/admin/blog" class="text-gray-400 hover:text-indigo-600">Blog</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit {{ $Blog->title }}</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center">
            <div class="bg-white/20 rounded-lg p-2 mr-3">
                <i class="fa fa-edit text-white text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white">Edit Blog Post: {{ $Blog->title }}</h3>
                <p class="text-indigo-100 text-sm mt-1">Update blog post content and information</p>
            </div>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Blog/{{$Blog->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Post Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Post Title <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text"
                    name="title"
                    id="title"
                    required
                    value="{{ $Blog->title }}"
                    placeholder="Enter post title"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5 h-12"
                >
                <p class="mt-1 text-xs text-gray-500">This will be displayed as the main heading for your blog post</p>
            </div>

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
                        class="text-sm text-indigo-600 hover:text-indigo-800 font-medium flex items-center"
                    >
                        <i class="fa fa-plus mr-1"></i> Add New Category
                    </button>
                </div>
            </div>

            <!-- Tags -->
            <div>
                @php
                    $selectedTags = $Blog->tags ? explode(',', $Blog->tags) : [];
                    $tagOptions = ['Bitcoin', 'Forex', 'Crypto', 'Stock', 'Currency', 'New York', 'Forbes', 'Educations', 'Events', 'Clubs'];
                @endphp
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">
                    Select Tags <span class="text-red-500">*</span>
                </label>
                <select 
                    name="tags" 
                    id="tags"
                    multiple
                    size="5"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm px-4 py-3 transition-colors"
                    required
                >
                    @foreach($tagOptions as $tag)
                    <option value="{{ $tag }}" {{ in_array($tag, $selectedTags) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                <p class="mt-1 text-xs text-gray-500 flex items-center">
                    <i class="fa fa-info-circle mr-1"></i> Hold Ctrl (Windows) or Cmd (Mac) to select multiple tags
                </p>
            </div>

            <!-- Meta Description -->
            <div x-data="{ metaLength: {{ strlen($Blog->meta ?? '') }} }">
                <label for="meta" class="block text-sm font-medium text-gray-700 mb-2">
                    Meta Description <span class="text-red-500">*</span>
                    <span class="text-gray-500 text-xs font-normal ml-2">(For SEO)</span>
                </label>
                <textarea 
                    name="meta"
                    id="meta"
                    rows="3"
                    required
                    placeholder="Enter a brief meta description for search engines (150-160 characters recommended)"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-colors px-4 py-3.5"
                    @input="metaLength = $event.target.value.length"
                >{{ $Blog->meta }}</textarea>
                <div class="mt-1 flex items-center justify-between">
                    <p class="text-xs text-gray-500">This description appears in search engine results</p>
                    <span class="text-xs" :class="metaLength > 160 ? 'text-red-500' : 'text-gray-500'">
                        <span x-text="metaLength"></span>/160 characters
                    </span>
                </div>
            </div>

            <!-- Content (CKEditor) -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fa fa-file-text-o mr-2"></i> Post Content <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="article-ckeditor" 
                    name="content" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[300px]"
                    rows="12"
                    required
                >{{ $Blog->content }}</textarea>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <i class="fa fa-lightbulb-o mr-1"></i> Use the rich text editor to format your content with headings, lists, images, and more
                </p>
                <script>
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor', {
                            height: 400,
                            toolbar: [
                                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                                { name: 'links', items: ['Link', 'Unlink'] },
                                { name: 'insert', items: ['Image', 'Table'] },
                                { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                { name: 'colors', items: ['TextColor', 'BGColor'] },
                                { name: 'tools', items: ['Maximize', 'Source'] }
                            ]
                        });
                    }
                </script>
            </div>

            <!-- Author -->
            <div>
                <x-admin.form.input 
                    name="author" 
                    label="Author Name" 
                    :value="Auth::user()->name"
                    readonly
                    required
                />
            </div>

            <!-- Blog Images -->
            <div>
                <div class="flex items-center mb-4 pb-2 border-b border-gray-200">
                    <div class="bg-pink-100 rounded-lg p-2 mr-3">
                        <i class="fa fa-image text-pink-600"></i>
                    </div>
                    <h4 class="text-base font-semibold text-gray-900">Blog Images</h4>
                </div>
                <p class="mt-2 mb-4 text-sm text-gray-600 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-indigo-500"></i> 
                    Upload high-quality images (600x600px recommended). First image is required and will be used as the featured image.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Image One -->
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_one}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Featured Image <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1 flex items-center mb-3">
                            <label for="image_one" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border-2 border-indigo-300 rounded-lg shadow-sm text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors">
                                    <i class="fa fa-upload mr-2"></i> Change
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
                            <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium truncate max-w-[120px]" x-text="fileName"></span>
                        </div>
                        <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                            <img :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain rounded">
                        </div>
                        <input type="hidden" name="image_one_cheat" value="{{$Blog->image_one}}">
                    </div>

                    <!-- Image Two -->
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_two ?? ''}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Two</label>
                        <div class="mt-1 flex items-center mb-3">
                            <label for="image_two" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    <i class="fa fa-upload mr-2"></i> Upload
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
                            <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium truncate max-w-[120px]" x-text="fileName"></span>
                        </div>
                        <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                            <img x-show="preview" :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain rounded">
                            <span x-show="!preview" class="text-gray-400 text-xs">Optional</span>
                        </div>
                        <input type="hidden" name="image_two_cheat" value="{{$Blog->image_two ?? ''}}">
                    </div>

                    <!-- Image Three -->
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_three ?? ''}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Three</label>
                        <div class="mt-1 flex items-center mb-3">
                            <label for="image_three" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    <i class="fa fa-upload mr-2"></i> Upload
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
                            <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium truncate max-w-[120px]" x-text="fileName"></span>
                        </div>
                        <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                            <img x-show="preview" :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain rounded">
                            <span x-show="!preview" class="text-gray-400 text-xs">Optional</span>
                        </div>
                        <input type="hidden" name="image_three_cheat" value="{{$Blog->image_three ?? ''}}">
                    </div>

                    <!-- Image Four -->
                    <div x-data="{ preview: '{{url('/')}}/uploads/blogs/{{$Blog->image_four ?? ''}}', fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Four</label>
                        <div class="mt-1 flex items-center mb-3">
                            <label for="image_four" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    <i class="fa fa-upload mr-2"></i> Upload
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
                            <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium truncate max-w-[120px]" x-text="fileName"></span>
                        </div>
                        <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                            <img x-show="preview" :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain rounded">
                            <span x-show="!preview" class="text-gray-400 text-xs">Optional</span>
                        </div>
                        <input type="hidden" name="image_four_cheat" value="{{$Blog->image_four ?? ''}}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/blog" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Save Changes
            </button>
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
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
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
                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700"
            >
                Submit
            </button>
        </div>
    </form>
</x-admin.modal>

@endsection
