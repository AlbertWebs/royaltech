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
                <span class="text-gray-900 font-medium">About Us</span>
                    </li>
        </ol>
    </nav>
</div>

<!-- Form Card -->
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 border-b border-indigo-800">
        <div class="flex items-center">
            <div class="bg-white/20 rounded-lg p-2 mr-3">
                <i class="fa fa-info-circle text-white text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white">Edit About Us</h3>
                <p class="text-indigo-100 text-sm mt-1">Update your company's about page content</p>
                                </div>
                                </div>
                            </div>
                            
    @foreach ($About as $item)
    <form method="POST" action="{{url('/')}}/admin/edit_About" enctype="multipart/form-data" class="px-6 py-6">
        @csrf
        
        <div class="space-y-6">
            <!-- Content Editor -->
            <div>
                <label for="article-ckeditor" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fa fa-file-text-o mr-2"></i> About Us Content <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="article-ckeditor-about" 
                    name="content" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm bg-white px-4 py-3.5 transition-colors min-h-[400px]"
                    rows="20"
                    required
                >{{ $item->content }}</textarea>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <i class="fa fa-lightbulb-o mr-1"></i> Use the rich text editor to format your content with headings, lists, images, and more
                </p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-6">
            <a href="{{url('/')}}/admin/SiteSettings" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <i class="fa fa-times mr-2"></i> Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all">
                <i class="fa fa-save mr-2"></i> Save Changes
            </button>
    </div>
    </form>
    @endforeach
</div>

<script>
(function() {
    function initCKEditor() {
        if (typeof CKEDITOR !== 'undefined') {
            // Check if editor already exists and destroy it
            if (CKEDITOR.instances['article-ckeditor-about']) {
                CKEDITOR.instances['article-ckeditor-about'].destroy();
            }
            
            // Initialize CKEditor
            CKEDITOR.replace('article-ckeditor-about', {
                height: 500,
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                    { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak'] },
                    { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                    { name: 'colors', items: ['TextColor', 'BGColor'] },
                    { name: 'tools', items: ['Maximize', 'Source', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'] }
                ],
                filebrowserBrowseUrl: '{{ asset("ckeditor/filemanager/index.html") }}',
                filebrowserImageBrowseUrl: '{{ asset("ckeditor/filemanager/index.html?type=Images") }}',
                filebrowserUploadUrl: '{{ asset("ckeditor/filemanager/connectors/php/connector.php?command=QuickUpload&type=Files") }}',
                filebrowserImageUploadUrl: '{{ asset("ckeditor/filemanager/connectors/php/connector.php?command=QuickUpload&type=Images") }}'
            });
        } else {
            // If CKEditor is not loaded yet, wait a bit and try again
            setTimeout(initCKEditor, 100);
        }
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCKEditor);
    } else {
        initCKEditor();
    }
})();
</script>

@endsection
