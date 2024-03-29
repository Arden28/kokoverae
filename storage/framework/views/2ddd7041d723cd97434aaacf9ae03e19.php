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

<?php
    $products = \Modules\Inventory\Entities\Product::isCompany(current_company()->id)->get();
?>

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="product">
            <?php echo e($value->label); ?>

        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model.blur="<?php echo e($value->model); ?>" id="" class="k_input">
            <option value=""></option>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
        </select>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
    </div>
    <?php if(strlen($value->label) > 16): ?>
        <br />
    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/select/product.blade.php ENDPATH**/ ?>