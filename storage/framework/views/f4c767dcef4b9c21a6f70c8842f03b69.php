<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="space-y-6">
        <!-- Header -->
        <div>
            <h3 class="text-lg font-medium text-gray-900">
                <?php echo e(isset($category) ? 'Edit Category' : 'Create Category'); ?>

            </h3>
            <p class="text-sm text-gray-500">
                <?php echo e(isset($category) ? 'Update the category details' : 'Add a new category to your site'); ?>

            </p>
        </div>

        <!-- Error Messages -->
        <?php if($errors->any()): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
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
        <form action="<?php echo e(isset($category) ? route('admin.categories.update', ['id' => $category->id]) : route('admin.categories.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php if(isset($category)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <!-- Name -->
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name', $category->name ?? '')); ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Order -->
            <div class="space-y-2">
                <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                <input type="text" name="order" id="order" value="<?php echo e(old('order', $category->order ?? $newOrder)); ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Is Featured -->
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1"
                    <?php echo e(old('is_featured', $category->is_featured ?? false) ? 'checked' : ''); ?>

                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-700">Is Featured</label>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo e(old('description', $category->description ?? '')); ?></textarea>
            </div>

            <!-- Parent Category -->
            <div class="space-y-2">
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category (optional)</label>
                <select name="parent_id" id="parent_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">None</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"
                            <?php echo e((isset($category) && $category->parent_id == $cat->id) || old('parent_id') == $cat->id ? 'selected' : ''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <?php echo e(isset($category) ? 'Update' : 'Create'); ?>

                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/admin/categories/form.blade.php ENDPATH**/ ?>