<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('auth.authenticate')); ?>" method="POST" class="flex flex-col gap-2 max-w-md">
        <?php echo csrf_field(); ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <label for="email" class="text-sm text-gray-700">Email</label>
        <input type="text" id="email" name="email" class="outline-0 ring ring-gray-300 focus:ring-black focus:border-black px-1">

        <label for="password" class="text-sm text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="outline-0 ring ring-gray-300 focus:ring-black focus:border-black px-1">

        <button type="submit" class="cursor-pointer bg-black text-white px-4 w-fit mt-1">LOGIN</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/auth/login.blade.php ENDPATH**/ ?>