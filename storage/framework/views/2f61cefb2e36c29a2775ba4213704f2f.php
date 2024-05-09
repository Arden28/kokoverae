<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'status'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'status'
]); ?>
<?php foreach (array_filter(([
    'value',
    'status'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <li class="dropdown-item cursor-pointer" wire:click="<?php echo e($value->action); ?>" wire:target="<?php echo e($value->action); ?>">
        <?php echo $value->label; ?>

    </li>
    <!--<li><hr class="dropdown-divider"></li>-->
</div>
<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/components/button/action/special-button.blade.php ENDPATH**/ ?>