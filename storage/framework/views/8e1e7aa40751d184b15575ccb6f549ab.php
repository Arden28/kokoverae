<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel"><?php echo e(__('Koverae')); ?></h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        <div class="k_form_nosheet">
            <p>
                <b><?php echo e($language->name); ?></b> <?php echo e(__(' has been successfully installed. Users can choose their favorite language in their preferences.')); ?>

            </p>
        </div>
      </div>
      <div class="p-0 modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')"><?php echo e(__('Close')); ?></button>
        <button class="btn btn-primary" wire:click.prevent="translate"><?php echo e(__('Switch to '. $language->name.' & Close')); ?></button>
      </div>
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Settings\Resources/views/livewire/modal/switch-language.blade.php ENDPATH**/ ?>