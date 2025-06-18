<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['item', 'class' => '', 'wrapper' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['item', 'class' => '', 'wrapper' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $type = $item->type;
    $value = $item->value;
?>

<?php if($wrapper): ?>
    <<?= $wrapper ?>>
<?php endif; ?>

    <?php if($type === 'text'): ?>
        <span class="<?php echo e($class); ?>"><?php echo e($value); ?></span>
    <?php elseif($type === 'internal_link' && !empty($item->article?->slug)): ?>
        <?php
            $link = $item->article->type === 'news'
                ? route('articles.show', $item->article->slug)
                : url($item->article->slug);
        ?>
        <a href="<?php echo e($link); ?>" class="<?php echo e($class); ?>"><?php echo e($value); ?></a>
    <?php elseif($type === 'external_link' && !empty($item->url)): ?>
        <a href="<?php echo e($item->url); ?>" class="<?php echo e($class); ?>" target="_blank" rel="noopener"><?php echo e($value); ?></a>
    <?php endif; ?>

<?php if($wrapper): ?>
    </<?php echo e($wrapper); ?>>
<?php endif; ?>
<?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/components/site-setting-item.blade.php ENDPATH**/ ?>