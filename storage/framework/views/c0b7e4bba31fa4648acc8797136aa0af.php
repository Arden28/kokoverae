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
    <!-- Customer Portal -->
    <div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="<?php echo e($value->key); ?>">

        <!-- Right pane -->
        <div class="k_setting_right_pane">
            <div class="mt12">
                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                    <span><?php echo e($value->label); ?></span>
                </div>
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                    <span>
                        <?php echo e($value->description); ?>

                    </span>
                </div>
            </div>
            <div class="mt16">
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                    <!-- What is ordered -->
                    <div>
                        <div class="form-check k_radio_item">
                            <input type="radio" class="form-check-input k_radio_input" wire:model.live="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="on_invitation" value="on_invitation"/>
                            <label class="form-check-label k_form_label" for="on_invitation">
                                <?php echo e(__('Sur Invitation')); ?>

                            </label>
                        </div>
                    </div>
                    <!-- What is free_signup -->
                    <div>
                        <div class="form-check k_radio_item">
                            <input type="radio" class="form-check-input k_radio_input" wire:model.live="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="free_signup" value="free_signup"/>
                            <label class="form-check-label k_form_label" for="free_signup">
                                <?php echo e(__('Inscription gratuite')); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/blocks/boxes/ratio/customer-account.blade.php ENDPATH**/ ?>