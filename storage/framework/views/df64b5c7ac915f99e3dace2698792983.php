<?php $__env->startSection('title', $category->name . ' - News Articles'); ?>
<?php $__env->startSection('meta_description', $category->description ?? 'Explore the latest news articles in ' . $category->name . ' category'); ?>

<?php $__env->startSection('content'); ?>
<main class="mx-auto">
    
    <header class="mb-6">
        
        <nav aria-label="Breadcrumb" class="flex items-center text-xs text-gray-600 mb-3 uppercase tracking-widest">
            <ol class="flex items-center">
                <li>
                    <a href="<?php echo e(route('home')); ?>" class="hover:text-black">Home</a>
                </li>
                <?php if($category->parent): ?>
                    <li aria-hidden="true" class="mx-2">•</li>
                    <li>
                        <a href="<?php echo e(route('categories.show', $category->parent->slug)); ?>" class="hover:text-black">
                            <?php echo e($category->parent->name); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <li aria-hidden="true" class="mx-2">•</li>
                <li aria-current="page" class="text-black font-semibold"><?php echo e($category->name); ?></li>
            </ol>
        </nav>
    </header>

    
    <h1 class="sr-only"><?php echo e($category->name); ?> Articles</h1>

    
    <section aria-labelledby="category-articles-heading">
        <h2 id="category-articles-heading" class="sr-only">Articles in <?php echo e($category->name); ?></h2>
        
        <div class="space-y-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5">
            <?php $__currentLoopData = $category->articles->where('status', 'published')->where('type', 'news'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="group" itemscope itemtype="http://schema.org/NewsArticle">
                    <a href="<?php echo e(route('articles.show', ['slug' => $article->slug])); ?>" class="block" itemprop="url">
                        <figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <img 
                                src="<?php echo e($article->featured_image_url ?? asset('images/thumb-placeholder.jpg')); ?>" 
                                alt="<?php echo e($article->title); ?>"
                                class="w-full aspect-video object-cover"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='<?php echo e(asset('images/thumb-placeholder.jpg')); ?>';"
                                itemprop="contentUrl"
                            />
                        </figure>
                        <h3 class="mt-2 line-clamp-2 group-hover:underline" itemprop="headline"><?php echo e($article->title); ?></h3>
                        <div class="flex items-center gap-1 text-xs text-gray-500 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <time datetime="<?php echo e($article->published_at); ?>" itemprop="datePublished">
                                <?php echo e(\Carbon\Carbon::parse($article->published_at)->diffForHumans()); ?>

                            </time>
                        </div>
                    </a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/pages/categories/show.blade.php ENDPATH**/ ?>