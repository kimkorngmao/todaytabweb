<?php $__env->startSection('content'); ?>
<main>
    
    <header class="border-b border-gray-300 pb-6 mb-8">

        
        <form action="<?php echo e(route('search')); ?>" method="GET" class="max-w-2xl">
            <div class="relative flex items-center">
                <input type="text" name="query" placeholder="Search articles..." value="<?php echo e(request('query')); ?>" required
                    class="w-full px-6 py-3 border border-gray-300 font-serif text-lg focus:outline-none focus:ring-1 focus:ring-gray-400">
                <button type="submit"
                    class="absolute right-2 bg-gray-800 text-white p-2 hover:bg-gray-700" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            <p class="text-xs text-gray-500 mt-2"><?php echo e($articles->total()); ?> results found</p>
        </form>
    </header>

    
    <?php if($articles->isEmpty()): ?>
        <section class="text-center py-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="font-serif text-2xl font-bold mb-2">No articles found</h1>
            <p class="text-gray-600 max-w-md mx-auto">We couldn't find any articles matching "<?php echo e(request('query')); ?>". Try different keywords or check our <a href="<?php echo e(route('home')); ?>" class="text-blue-600 hover:underline">homepage</a> for the latest news.</p>
        </section>
    <?php else: ?>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="group border-b border-gray-200 pb-6 mb-6">
                <a href="<?php echo e(route('articles.show', $article->slug)); ?>" class="flex items-start space-x-4">
                    <div class="flex-1">
                        <h2 class="font-serif font-bold text-lg mb-2 group-hover:underline line-clamp-2"><?php echo e($article->title); ?></h2>
                        <p class="text-sm text-gray-700 mb-2"><?php echo e(Str::limit($article->excerpt ?? $article->content, 120)); ?></p>
                        <div class="flex items-center text-xs text-gray-500">
                            <time datetime="<?php echo e($article->published_at); ?>"><?php echo e(\Carbon\Carbon::parse($article->published_at)->diffForHumans()); ?></time>
                            <span class="mx-2">•</span>
                            <span><?php echo e($article->category?->name); ?></span>
                        </div>
                    </div>
                    <figure class="w-20 flex-shrink-0">
                        <img src="<?php echo e($article->featured_image_url); ?>" alt="<?php echo e($article->title); ?>"
                             class="w-full h-16 object-cover" loading="lazy">
                    </figure>
                </a>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>

        
        <nav class="flex justify-center mt-10" aria-label="Pagination">
            <div class="flex items-center space-x-2">
                <?php if($articles->onFirstPage()): ?>
                    <span class="px-3 py-1 border border-gray-300 text-gray-400 cursor-not-allowed">Previous</span>
                <?php else: ?>
                    <a href="<?php echo e($articles->previousPageUrl()); ?>" class="px-3 py-1 border border-gray-300 hover:bg-gray-100" rel="prev">Previous</a>
                <?php endif; ?>

                <?php $__currentLoopData = $articles->getUrlRange(1, $articles->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $articles->currentPage()): ?>
                        <span class="px-3 py-1 border border-gray-300 bg-gray-800 text-white" aria-current="page"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="px-3 py-1 border border-gray-300 hover:bg-gray-100"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($articles->hasMorePages()): ?>
                    <a href="<?php echo e($articles->nextPageUrl()); ?>" class="px-3 py-1 border border-gray-300 hover:bg-gray-100" rel="next">Next</a>
                <?php else: ?>
                    <span class="px-3 py-1 border border-gray-300 text-gray-400 cursor-not-allowed">Next</span>
                <?php endif; ?>
            </div>
        </nav>
    <?php endif; ?>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/pages/search.blade.php ENDPATH**/ ?>