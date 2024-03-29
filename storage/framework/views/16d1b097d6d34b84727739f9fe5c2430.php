<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
]); ?>
<?php foreach (array_filter(([
    'value',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $categories = \Modules\Inventory\Entities\Category::isCompany(current_company()->id)->get();
?>

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- UoM -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="category">
            <?php echo e($value->label); ?>

            <!--[if BLOCK]><![endif]--><?php if($value->help): ?>
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="<?php echo e($value->help); ?>"></i></sup>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]--> :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model.live="<?php echo e($value->model); ?>" id="" class="k_input">
            <option value=""></option>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
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
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/select/product/categories.blade.php ENDPATH**/ ?>