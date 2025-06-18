<?php $__env->startSection('head'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs/loader.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="space-y-6">
        <!-- Header -->
        <div>
            <h3 class="text-lg font-medium text-gray-900">
                <?php echo e(isset($article) ? 'Edit Article' : 'Create Article'); ?>

            </h3>
            <p class="text-sm text-gray-500">
                <?php echo e(isset($article) ? 'Update the article details' : 'Add a new article to your site'); ?>

            </p>
        </div>

        <!-- Error Messages -->
        <?php if($errors->any()): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            There were <?php echo e($errors->count()); ?> errors with your submission
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?php echo e(isset($article) ? route('admin.articles.update', $article->id) : route('admin.articles.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php if(isset($article)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <!-- Type -->
            <div class="space-y-2">
                <label for="type" class="block text-sm font-medium text-gray-700">
                    Type
                </label>
                <select name="type" id="type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php $__currentLoopData = ['news', 'page', 'blog', 'standalone']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($typeOption); ?>" <?php echo e(old('type', $article->type ?? '') === $typeOption ? 'selected' : ''); ?>>
                            <?php echo e(ucfirst($typeOption)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Title -->
            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">
                    Title
                </label>
                <input type="text" name="title" id="title" value="<?php echo e(old('title', $article->title ?? '')); ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Excerpt -->
            <div class="space-y-2">
                <label for="excerpt" class="block text-sm font-medium text-gray-700">
                    Excerpt
                </label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo e(old('excerpt', $article->excerpt ?? '')); ?></textarea>
            </div>

            <!-- Content -->
            <div class="space-y-2">
                <label for="content" class="block text-sm font-medium text-gray-700">
                    Content
                </label>
                <div id="editor-wrapper">
                    <textarea name="content" id="content" rows="6" style="display: none;"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo e(old('content', $article->content ?? '')); ?></textarea>
                    <div id="monaco-editor-container" style="display: none;"></div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="space-y-2">
                <label for="featured_image_url" class="block text-sm font-medium text-gray-700">
                    Featured Image
                </label>

                    <input type="file" name="featured_image_url" id="featured_image_url" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <div>
                    <?php if(isset($article) && $article->featured_image_url): ?>
                        <img src="<?php echo e($article->featured_image_url); ?>" alt="Featured Image" class="w-56 aspact-video object-cover rounded-md">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Status -->
            <div class="space-y-2">
                <label for="status" class="block text-sm font-medium text-gray-700">
                    Status
                </label>
                <select name="status" id="status"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php $__currentLoopData = ['draft', 'published', 'archived']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($statusOption); ?>" <?php echo e(old('status', $article->status ?? 'draft') === $statusOption ? 'selected' : ''); ?>>
                            <?php echo e(ucfirst($statusOption)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Published At -->
            <div class="space-y-2">
                <label for="published_at" class="block text-sm font-medium text-gray-700">
                    Published At
                </label>
                <input type="datetime-local" name="published_at" id="published_at"
                    value="<?php echo e(old('published_at', isset($article->published_at) ? \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i'))); ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Category -->
            <div class="space-y-2">
                <label for="category_id" class="block text-sm font-medium text-gray-700">
                    Category
                </label>
                <select name="category_id" id="category_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $article->category_id ?? '') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Meta Description -->
            <div class="space-y-2">
                <label for="meta_description" class="block text-sm font-medium text-gray-700">
                    Meta Description
                </label>
                <textarea name="meta_description" id="meta_description" rows="2"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo e(old('meta_description', $article->meta_description ?? '')); ?></textarea>
            </div>

            <!-- Is Featured -->
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1"
                    <?php echo e(old('is_featured', $article->is_featured ?? false) ? 'checked' : ''); ?>

                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                    Is Featured
                </label>
            </div>

            <!-- View Count (Readonly) -->
            <div class="space-y-2">
                <label for="view_count" class="block text-sm font-medium text-gray-700">
                    View Count
                </label>
                <input type="number" id="view_count" value="<?php echo e($article->view_count ?? 0); ?>" disabled
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-gray-100">
            </div>

            <!-- Tags -->
            <div class="space-y-2">
                <label for="tags" class="block text-sm font-medium text-gray-700">
                    Tags (Comma separated)
                </label>
                <input type="text" name="tags" id="tags" 
                    value="<?php echo e(old('tags', isset($article) ? $article->tags->pluck('name')->implode(', ') : '')); ?>"
                    placeholder="Enter tags separated by commas"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <?php echo e(isset($article) ? 'Update Article' : 'Create Article'); ?>

                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        let monacoEditor = null;
        let classicEditor = null;

        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('type');
            const content = document.getElementById('content');
            const monacoContainer = document.getElementById('monaco-editor-container');

            // Initialize appropriate editor based on initial type
            initializeEditor(typeSelect.value);

            // Handle type changes
            typeSelect.addEventListener('change', function() {
                initializeEditor(this.value);
            });

            function initializeEditor(type) {
                const initialContent = content.value;

                if (type === 'standalone') {
                    // Destroy CKEditor if exists
                    if (classicEditor) {
                        classicEditor.destroy().catch(error => {});
                        classicEditor = null;
                    }

                    // Show Monaco container
                    monacoContainer.style.display = 'block';
                    content.style.display = 'none';

                    // Initialize Monaco Editor
                    if (!monacoEditor) {
                        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs' }});
                        require(['vs/editor/editor.main'], function() {
                            monacoEditor = monaco.editor.create(monacoContainer, {
                                value: initialContent,
                                language: 'html',
                                theme: 'vs-dark',
                                minimap: { enabled: false },
                                automaticLayout: true
                            });

                            // Update textarea on form submit
                            document.querySelector('form').addEventListener('submit', function() {
                                content.value = monacoEditor.getValue();
                            });
                        });
                    }
                } else {
                    // Destroy Monaco if exists
                    if (monacoEditor) {
                        monacoEditor.dispose();
                        monacoEditor = null;
                    }

                    // Hide Monaco container
                    monacoContainer.style.display = 'none';
                    content.style.display = 'block';

                    // Initialize CKEditor
                    if (!classicEditor) {
                        ClassicEditor
                            .create(content, {
                                toolbar: {
                                    items: [
                                        'heading',
                                        '|',
                                        'bold',
                                        'italic',
                                        'link',
                                        'bulletedList',
                                        'numberedList',
                                        '|',
                                        'blockQuote',
                                        '|',
                                        'undo',
                                        'redo'
                                    ]
                                }
                            })
                            .then(editor => {
                                classicEditor = editor;
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\00Others\todaytab\resources\views/admin/articles/form.blade.php ENDPATH**/ ?>