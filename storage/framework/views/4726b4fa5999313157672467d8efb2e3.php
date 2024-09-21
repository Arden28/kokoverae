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
<div class="p-1 pb-3 mb-3" style="border-bottom: 1px solid #D8DADD;">
    <div class="mb-2 k_horizontal">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $value->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-check k_radio_item">
            <input type="<?php echo e($value->type); ?>" class="form-check-input k_radio_input" name="<?php echo e($value->model); ?>" wire:model.live="<?php echo e($value->model); ?>" id="<?php echo e($option['value']); ?>" value="<?php echo e($option['value']); ?>"/>
            <label class="k_form_label" for="<?php echo e($option['value']); ?>">
                    <?php echo e($option['label']); ?>

            </label>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <p class="mb-0">
        <span class="text-muted">
            <!--[if BLOCK]><![endif]--><?php if($this->type == 'contact'): ?>
                <?php echo e(__('Use this to organize company employee contacts (e.g., CEO, CTO).')); ?>

            <?php elseif($this->type == 'invoice-address'): ?>
                <?php echo e(__('Default address for all invoices, automatically selected for company orders.')); ?>

            <?php elseif($this->type == 'delivery-address'): ?>
                <?php echo e(__('Default delivery address, automatically selected for company orders.')); ?>

            <?php else: ?>
                <?php echo e(__(' Other address for the company (e.g. subsidiary, ...).')); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </span>
    </p>
</div>

<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/input/radio/special/contact-type.blade.php ENDPATH**/ ?>