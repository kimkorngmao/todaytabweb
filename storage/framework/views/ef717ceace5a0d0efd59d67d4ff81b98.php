<?php $__env->startSection('title','Latest Articles'); ?>

<?php $__env->startSection('content'); ?>
<main>
    
    <nav aria-label="Breadcrumb" class="mb-6 flex items-center text-xs text-gray-600 mb-3 uppercase tracking-widest">
        <ol class="flex items-center">
            <li>
                <a href="<?php echo e(route('home')); ?>" class="hover:text-black">Home</a>
            </li>
            <li aria-hidden="true" class="mx-2">•</li>
            <li aria-current="page" class="text-black font-semibold">Latest</li>
        </ol>
    </nav>

    
    <section aria-labelledby="latest-articles-heading">
        <h1 id="latest-articles-heading" class="sr-only">Latest Articles</h1>
        
        <div class="space-y-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="group">
                    <a href="<?php echo e(route('articles.show', ['slug' => $article->slug])); ?>" class="block">
                        <figure>
                            <img 
                                src="<?php echo e($article->featured_image_url ?? asset('images/thumb-placeholder.jpg')); ?>" 
                                alt="<?php echo e($article->title); ?>"
                                class="w-full aspect-video object-cover"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='<?php echo e(asset('images/thumb-placeholder.jpg')); ?>';"
                            />
                        </figure>
                        <h2 class="mt-2 line-clamp-2 group-hover:underline"><?php echo e($article->title); ?></h2>
                        <div class="flex items-center gap-1 text-xs text-gray-500 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <time datetime="<?php echo e($article->published_at); ?>"><?php echo e(\Carbon\Carbon::parse($article->published_at)->diffForHumans()); ?></time>
                        </div>
                    </a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-8">
            <?php echo e($articles->links()); ?>

        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\00Others\todaytab\resources\views/pages/articles/latest.blade.php ENDPATH**/ ?>