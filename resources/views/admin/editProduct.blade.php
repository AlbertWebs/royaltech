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
                <a href="{{url('/')}}/admin/products" class="text-gray-400 hover:text-indigo-600">Products</a>
            </li>
            <li>
                <span class="text-gray-500 mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-900 font-medium">Edit {{ $Product->name }}</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div>
            <h3 class="text-lg font-semibold text-white">Edit Product: {{ $Product->name }}</h3>
            <p class="text-indigo-100 text-sm mt-1">Update product information</p>
        </div>
    </div>
    
    <form method="POST" action="{{url('/')}}/admin/edit_Product/{{$Product->id}}" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Name -->
            <div class="md:col-span-2">
                <x-admin.form.input 
                    name="title" 
                    label="Product Name" 
                    :value="$Product->name"
                    placeholder="Enter product name"
                    required
                />
            </div>

            <!-- Product Price -->
            <x-admin.form.input 
                name="price" 
                label="Product Price" 
                type="number"
                :value="$Product->price"
                placeholder="0.00"
                required
            />

            <!-- SKU -->
            <x-admin.form.input 
                name="sku" 
                label="SKU" 
                :value="$Product->sku"
                placeholder="SKU-01"
                required
                readonly
            />

            <!-- Category -->
            <div>
                @php
                    $CategorySelected = DB::table('categories')->where('id', $Product->category)->first();
                    $categoryOptions = [];
                    foreach($Category as $cat) {
                        $categoryOptions[$cat->id] = $cat->title;
                    }
                @endphp
                <x-admin.form.select 
                    name="category" 
                    label="Choose Category" 
                    :options="$categoryOptions"
                    :value="$Product->category"
                    placeholder="Select a category"
                    required
                />
            </div>

            <!-- Brand -->
            <div>
                @php
                    $Brand = DB::table('brands')->get();
                    $brandOptions = [];
                    foreach($Brand as $brand) {
                        $brandOptions[$brand->title] = $brand->title;
                    }
                @endphp
                <x-admin.form.select 
                    name="brand" 
                    label="Choose Brand" 
                    :options="$brandOptions"
                    :value="$Product->brand"
                    placeholder="Select a brand"
                    required
                />
            </div>

            <!-- Product Condition -->
            <x-admin.form.select 
                name="condition" 
                label="Product Condition" 
                :options="['Ex-UK' => 'Ex-UK', 'New' => 'New']"
                :value="$Product->pro_condition"
                placeholder="Select condition"
                required
            />

            <!-- Stock Status -->
            <div class="bg-gray-50 rounded-lg p-4">
                <h4 class="text-sm font-medium text-gray-900 mb-3">Stock Status</h4>
                <x-admin.form.toggle 
                    name="stock" 
                    label="In Stock"
                    :value="$Product->stock == 'In Stock'"
                />
            </div>
        </div>

        <!-- Meta Description -->
        <div class="mt-6">
            <x-admin.form.textarea 
                name="meta" 
                label="Meta Description" 
                :value="$Product->meta"
                rows="3"
                placeholder="Enter meta description for SEO"
                required
            />
        </div>

        <!-- Content (CKEditor) -->
        <div class="mt-6">
            <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                Product Description <span class="text-red-500">*</span>
            </label>
            <textarea 
                id="article-ckeditor" 
                name="content" 
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[300px]"
                rows="12"
                required
            >{{ $Product->content }}</textarea>
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

        <!-- Product Images -->
        <div class="mt-6">
            <h4 class="text-sm font-medium text-gray-900 mb-4">Product Images (600px x 600px recommended)</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Image One -->
                <div x-data="{ preview: '{{url('/')}}/uploads/products/{{$Product->image_one}}', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image One</label>
                    <div class="mt-1 flex items-center mb-3">
                        <label for="image_one" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="image_one_cheat" value="{{$Product->image_one}}">
                </div>

                <!-- Image Two -->
                <div x-data="{ preview: '{{url('/')}}/uploads/products/{{$Product->image_two}}', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image Two</label>
                    <div class="mt-1 flex items-center mb-3">
                        <label for="image_two" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="image_two_cheat" value="{{$Product->image_two}}">
                </div>

                <!-- Image Three -->
                <div x-data="{ preview: '{{url('/')}}/uploads/products/{{$Product->image_three}}', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image Three</label>
                    <div class="mt-1 flex items-center mb-3">
                        <label for="image_three" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="image_three_cheat" value="{{$Product->image_three}}">
                </div>

                <!-- Image Four -->
                <div x-data="{ preview: '{{url('/')}}/uploads/products/{{$Product->image_four}}', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image Four</label>
                    <div class="mt-1 flex items-center mb-3">
                        <label for="image_four" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
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
                        <span x-show="fileName" class="ml-3 text-sm text-gray-600 font-medium" x-text="fileName"></span>
                    </div>
                    <div class="mt-4 bg-gray-200 rounded-lg border-2 border-gray-200 p-4 flex items-center justify-center h-32 overflow-hidden">
                        <img :src="preview" alt="Preview" class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                    <input type="hidden" name="image_four_cheat" value="{{$Product->image_four}}">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/products" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Save Changes
            </button>
        </div>
    </form>
</div>

@endsection
