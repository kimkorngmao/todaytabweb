<?php $__env->startSection('content'); ?>
<div class="px-6 py-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Site Settings</h1>
        <a href="<?php echo e(route('admin.site-settings.create')); ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
            + Add New Setting
        </a>
    </div>

    <div class="bg-white overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value/Content</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Updated</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if($settings->isEmpty()): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium text-gray-900 mb-2">No site settings found</p>
                                    <p class="text-gray-500">Get started by creating your first site setting.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    <?php echo e($setting->key); ?>

                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php
                                $fieldType = $setting->type ?? 'text';
                                $badgeColors = [
                                    'text' => 'bg-gray-100 text-gray-800',
                                    'internal_link' => 'bg-green-100 text-green-800',
                                    'external_link' => 'bg-purple-100 text-purple-800'
                                ];
                                $typeLabels = [
                                    'text' => 'Text',
                                    'internal_link' => 'Internal Link',
                                    'external_link' => 'External Link'
                                ];
                            ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($badgeColors[$fieldType]); ?>">
                                <?php echo e($typeLabels[$fieldType]); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <?php if($setting->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $setting->image)); ?>" alt="<?php echo e($setting->key); ?>" class="h-10 w-10 rounded-md object-cover flex-shrink-0">
                                <?php endif; ?>

                                <div class="flex-1 min-w-0">
                                    <?php if($setting->field_type === 'external_link' && $setting->url): ?>
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                            <a href="<?php echo e($setting->url); ?>" target="_blank" class="text-sm text-purple-600 hover:text-purple-900 truncate">
                                                <?php echo e($setting->url); ?>

                                            </a>
                                        </div>
                                        <?php if($setting->value): ?>
                                            <div class="text-sm text-gray-900 mt-1"><?php echo e(Str::limit($setting->value, 40)); ?></div>
                                        <?php endif; ?>
                                    <?php elseif($setting->field_type === 'internal_link' && $setting->article_id): ?>
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span class="text-sm text-green-600">
                                                <?php if($setting->article): ?>
                                                    <?php echo e(Str::limit($setting->article->title, 40)); ?>

                                                <?php else: ?>
                                                    Article #<?php echo e($setting->article_id); ?>

                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <?php if($setting->value): ?>
                                            <div class="text-sm text-gray-900 mt-1"><?php echo e(Str::limit($setting->value, 40)); ?></div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="text-sm text-gray-900">
                                            <?php echo e($setting->value ? Str::limit($setting->value, 50) : '-'); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <?php echo e($setting->description ? Str::limit($setting->description, 60) : '-'); ?>

                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo e($setting->order ?? 0); ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($setting->updated_at->format('M j, Y')); ?>

                            <div class="text-xs text-gray-400"><?php echo e($setting->updated_at->format('H:i')); ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="<?php echo e(route('admin.site-settings.edit', $setting->id)); ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <form action="<?php echo e(route('admin.site-settings.destroy', $setting->id)); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-900" 
                                        onclick="return confirm('Are you sure you want to delete this setting?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\todaytabweb\resources\views/admin/site_settings/index.blade.php ENDPATH**/ ?>