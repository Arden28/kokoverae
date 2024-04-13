<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value'
]); ?>
<?php foreach (array_filter(([
    'value'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $employee = \Modules\Employee\Entities\Employee::find($value);
?>
<!--[if BLOCK]><![endif]--><?php if($employee): ?>
<div>
    <a style="text-decoration: none" wire:navigate href="<?php echo e(route('employee.show' , ['subdomain' => current_company()->domain_name, 'employee' => $employee->id, 'menu' => current_menu() ])); ?>"  tabindex="-1">
        <?php echo e($employee->user->name); ?>

    </a>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/employees/employee.blade.php ENDPATH**/ ?>