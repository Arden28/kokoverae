<?php

namespace Modules\Contact\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class IndustryPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Industries";
        // $this->new = "#";
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }


    public function switchButtons() : array
    {
        return  [
            // make($key, $label)
            SwitchButton::make('lists',"changeView('lists')", "bi-list-task"),
            SwitchButton::make('kanban',"changeView('lists')", "bi-kanban"),
            // SwitchButton::make('delivery_lead_time',"Delais de livraison", ''),
        ];
    }
}
