<div>
    <?php $__env->startSection('title', __('Bank Accounts')); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact::navbar.control-panel.bank-account-panel', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1202127298-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <div class="w-100 d-print-none">
        <!-- Notify -->
        <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Table -->
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact::table.banks-account-table', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1202127298-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

</div>

<?php /**PATH D:\My Laravel Startup\koverae\Modules/Contact\Resources/views/livewire/bank/account/lists.blade.php ENDPATH**/ ?>