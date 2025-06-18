<?php $__env->startSection('title', $article->title); ?>
<?php $__env->startSection('meta_description', $article->meta_description ?? ($article->excerpt ?? Str::limit(strip_tags($article->content), 150))); ?>

<?php $__env->startSection('content'); ?>
    <?php if($article->type == 'standalone'): ?>
        <?php echo $article->content; ?>

    <?php else: ?>
        <div class="todaytab-editor">
            <?php echo $article->content; ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($article->type == 'standalone' ? 'layouts.blank' : 'layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/pages/show.blade.php ENDPATH**/ ?>