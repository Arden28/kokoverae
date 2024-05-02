<div>
    <!-- Table -->
    <div class="table-responsive w-100 mb-2">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort"><?php echo e(__('Composant')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Quantité à consommer')); ?></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.live="inputs.<?php echo e($key); ?>.product" id="" class="k_input">
                            <option value=""></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["inputs.<?php echo e($key); ?>.product"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.<?php echo e($key); ?>.quantity" class="k_input">
                    </td>
                    <td class="k_field_list">
                        <select wire:model.live="inputs.<?php echo e($key); ?>.uom" id="" class="k_input">
                            <option value=""></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $uoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($uom->id); ?>"><?php echo e($uom->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["inputs.<?php echo e($key); ?>.uom"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    
                    <td class="k_field_list cursor-pointer">
                        <span wire:click.prevent="remove(<?php echo e($key); ?>)">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add(<?php echo e($i); ?>)" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Manufacturing\Resources/views/livewire/cart/bom-component-cart.blade.php ENDPATH**/ ?>