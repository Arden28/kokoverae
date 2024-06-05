<div>
    <?php $__env->startSection('title', $product->product_name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::navbar.control-panel.product-form-panel', ['event' => 'update-product','product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3014309931-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <!-- Form -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::form.product-form', ['product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3014309931-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>
<?php /**PATH D:\My Laravel Project\koverae-app\Modules/Inventory\Resources/views/livewire/product/show.blade.php ENDPATH**/ ?>