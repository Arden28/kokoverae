<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'data'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'data'
]); ?>
<?php foreach (array_filter(([
    'value',
    'data'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<h1 class="d-flex flex-row align-items-center">
    <!--[if BLOCK]><![endif]--><?php if($this->reference): ?>
        <?php echo e($this->reference); ?>

    <?php else: ?>
        <?php echo e(__('Nouveau')); ?>

    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
</h1>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/reference/new.blade.php ENDPATH**/ ?>