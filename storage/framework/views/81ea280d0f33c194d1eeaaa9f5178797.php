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
    if ($this->location) {
        $locations = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::isCompany(current_company()->id)->where('id', '!=', $this->location->id)->get();
    }else {
        $locations = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::isCompany(current_company()->id)->get();
    }
?>
<span for="" class="k_form_label font-weight-bold"><?php echo e($value->label); ?></span>
<h1 class="d-flex flex-row align-items-center">
    <input type="<?php echo e($value->type); ?>"wire:model="<?php echo e($value->model); ?>" class="k_input" id="name_k" placeholder="<?php echo e($value->placeholder); ?>">
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
</h1>
<div class="k_inner_group" style="margin: 5px 0 0 0">
    <div class="d-flex" style="margin-bottom: 8px;">
        <!-- Input Label -->
        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
            <label class="k_form_label">
                <?php echo e(__('Emplacement parent')); ?>

            </label>
        </div>
        <!-- Input Form -->
        <div class="k_cell k_wrap_input flex-grow-1">
            <select wire:model="parent" id="parent_id" class="k_input" style="width: 25%;">
                <option value=""></option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
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
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/location/ke-title.blade.php ENDPATH**/ ?>