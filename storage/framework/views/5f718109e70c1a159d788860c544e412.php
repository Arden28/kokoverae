<div>
    <div class="gap-3 k_control_panel d-flex flex-column gap-lg-1">
      <div class="flex-wrap gap-5 k_control_panel_main d-flex flex-nowrap justify-content-between align-items-lg-start flex-grow-1">
          <!-- Breadcrumbs -->
          <div class="gap-1 k_control_panel_breadcrumbs d-flex align-items-center order-0 h-lg-100">
            <div class="gap-1 k_form_buttons_edit d-flex">
                <!-- Create Button -->
                <button wire:click="saveUpdate" wire:target="saveUpdate" class="btn btn-primary k_form_button_save">
                    <?php echo e(__('Save')); ?> <span wire:loading wire:target="saveUpdate">...</span>
                </button>
                <!-- Create Button -->
                <button wire:click="cancelUpdate" wire:target="cancelUpdate" class="btn btn-secondary k_form_button_cancel">
                    <?php echo e(__('Discard')); ?> <span wire:loading wire:target="cancelUpdate">...</span></span>
                </button>
                <!--[if BLOCK]><![endif]--><?php if($this->change): ?>
                <span class=""><?php echo e(__('Usaved changes')); ?></span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
                <div class="min-w-0 gap-2 k_last_breadcrumb_item active align-items-center lh-sm">
                    <div class="gap-1 d-flex text-truncate">
                        <span class="min-w-0 text-truncate" id="current-page">
                            <?php echo e($this->currentPage); ?>

                        </span>
                    </div>
                </div>
          </div>

          <!-- Actions / Search Bar -->
          <div class="order-2 k_panel_control_actions d-flex align-items-center justify-content-start order-lg-1 w-100 w-lg-auto justify-content-lg-around">

          </div>

      </div>
    </div>
    
    <!-- Loading -->
    <div class="pb-1 cursor-pointer k-loading" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
    
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/livewire/navbar/template/simple.blade.php ENDPATH**/ ?>