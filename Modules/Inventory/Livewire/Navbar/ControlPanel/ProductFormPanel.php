<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;
use App\Livewire\Navbar\Button\ActionButton;

class ProductFormPanel extends ControlPanel
{
    public $product;

    public function mount($product = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($product){
            $this->product = $product;
            $this->currentPage = $product->product_name;
        }else{
            $this->currentPage = __('translator::inventory.control.product.current_page_new');
        }
        $this->new = route('inventory.products.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('archive', '<i class="bi bi-inboxes"></i>'.__('translator::inventory.control.product.actions.archive'), ''),
            ActionButton::make('duplicate', __('translator::inventory.control.product.actions.duplicate'), 'duplicateProduct()'),
            ActionButton::make('delete', '<i class="bi bi-trash"></i>'.__('translator::inventory.control.product.actions.delete'), 'deleteProduct()'),
            // Add more buttons as needed
        ];
    }

    public function duplicateProduct(){
        $this->dispatch('duplicate-product', $this->product->id);
    }

    public function deleteProduct(){
        $this->dispatch('delete-product', $this->product->id);
    }


}
