<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="space-y-6">
        <!-- Header -->
        <div>
            <h3 class="text-lg font-medium text-gray-900">
                <?php echo e(isset($role) ? 'Edit Role' : 'Create Role'); ?>

            </h3>
            <p class="text-sm text-gray-500">
                <?php echo e(isset($role) ? 'Update the role details' : 'Add a new role to your system'); ?>

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
        <form action="<?php echo e(isset($role) ? route('admin.roles.update', ['id' => $role->id]) : route('admin.roles.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php if(isset($role)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <!-- Name -->
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name', $role->name ?? '')); ?>" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Permissions -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Permissions</label>
                <div class="space-y-6 mt-2">
                    <?php if($permissions): ?>
                        <?php
                            $groupedPermissions = $permissions->groupBy('controller');
                        ?>

                        <?php $__currentLoopData = $groupedPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $controller => $controllerPermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-sm font-medium text-gray-900"><?php echo e($controller ?: 'General'); ?></h4>
                                    <button type="button" 
                                        class="select-all-btn text-sm text-blue-600 hover:text-blue-800"
                                        data-controller="<?php echo e($controller); ?>">
                                        Select All
                                    </button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <?php $__currentLoopData = $controllerPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label for="permission-<?php echo e($permission->id); ?>" class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input type="checkbox" 
                                                    name="permissions[]" 
                                                    value="<?php echo e($permission->id); ?>" 
                                                    id="permission-<?php echo e($permission->id); ?>" 
                                                    data-controller="<?php echo e($controller); ?>"
                                                    <?php echo e(in_array($permission->id, old('permissions', isset($role) ? $role->permissions->pluck('id')->toArray() : [])) ? 'checked' : ''); ?>

                                                    class="permission-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <span class="font-medium text-gray-700"><?php echo e($permission->action_name); ?></span>
                                            </div>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" 
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <?php echo e(isset($role) ? 'Update Role' : 'Create Role'); ?>

                </button>
            </div>
        </form>
    </div>
</div>

<!-- Add this script section at the end of the file -->
<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllButtons = document.querySelectorAll('.select-all-btn');
        
        selectAllButtons.forEach(button => {
            button.addEventListener('click', function() {
                const controller = this.dataset.controller;
                const checkboxes = document.querySelectorAll(`input[data-controller="${controller}"]`);
                const areAllChecked = [...checkboxes].every(cb => cb.checked);
                
                checkboxes.forEach(checkbox => {
                    checkbox.checked = !areAllChecked;
                });
                
                this.textContent = areAllChecked ? 'Select All' : 'Unselect All';
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\todaytabweb\resources\views/admin/roles/form.blade.php ENDPATH**/ ?>