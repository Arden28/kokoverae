<?php

namespace Modules\Sales\Livewire\Quotation;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('sales::livewire.quotation.create')
        ->extends('layouts.master');
    }

}
