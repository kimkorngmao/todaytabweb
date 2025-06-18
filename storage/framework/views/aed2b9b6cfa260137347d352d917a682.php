<?php $__env->startSection('title', 'Login History for ' . ($user->username ?? $user->email)); ?>

<?php $__env->startSection('content'); ?>
<div class="px-6 py-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Login History for <?php echo e($user->username ?? $user->email); ?></h1>
    </div>
    <div class="mb-4">
        <span class="font-semibold">Name:</span> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?><br>
        <span class="font-semibold">Email:</span> <?php echo e($user->email); ?>

    </div>

    <?php if(empty($logins)): ?>
    <div class="bg-white p-6 text-center">
        <p class="text-gray-500">No login history found for this user.</p>
    </div>
    <?php else: ?>
    <div class="bg-white overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Agent</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Login Time</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $logins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $login): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($login->ip_address); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500"><?php echo e($login->user_agent); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($login->created_at->format('Y-m-d H:i:s')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            <?php echo e($logins->links()); ?>

        </div>
    </div>
    <?php endif; ?>
    <div class="mt-4">
        <a href="<?php echo e(route('admin.logins.index')); ?>" class="text-blue-600 hover:underline">&larr; Back to all logins</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\todaytabweb\resources\views/admin/user_logins/user.blade.php ENDPATH**/ ?>