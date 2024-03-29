<div>
    <?php $__env->startSection('title', __('Demandes de prix')); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('purchase::navbar.control-panel.request-quotation-panel', []);

$__html = app('livewire')->mount($__name, $__params, 'N4gLVbG', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('purchase::table.request-quotation-table', []);

$__html = app('livewire')->mount($__name, $__params, 'm42d8kM', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Purchase\Resources/views/livewire/order/request/lists.blade.php ENDPATH**/ ?>