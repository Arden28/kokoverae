<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value','id']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value','id']); ?>
<?php foreach (array_filter((['value','id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal6eafdd8681902ae5557c8cec3196eae1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eafdd8681902ae5557c8cec3196eae1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.columns.common.product.format_currency','data' => ['value' => $value,'id' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('columns.common.product.format_currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6eafdd8681902ae5557c8cec3196eae1)): ?>
<?php $attributes = $__attributesOriginal6eafdd8681902ae5557c8cec3196eae1; ?>
<?php unset($__attributesOriginal6eafdd8681902ae5557c8cec3196eae1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6eafdd8681902ae5557c8cec3196eae1)): ?>
<?php $component = $__componentOriginal6eafdd8681902ae5557c8cec3196eae1; ?>
<?php unset($__componentOriginal6eafdd8681902ae5557c8cec3196eae1); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Project\koverae-app\storage\framework\views/81004b647a893d801a564725dc35f9be.blade.php ENDPATH**/ ?>