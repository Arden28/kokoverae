<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Program\SalesProgram;
use Modules\Sales\Entities\Quotation\Quotation;

class SalesProgramTable extends Table
{

    public function createRoute() : string
    {

        return route('sales.programs.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('sales.programs.show' , ['subdomain' => current_company()->domain_name, 'program' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return 'Remises & Fidélité';
    }

    public function query() : Builder
    {
        return SalesProgram::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', __('translator::sales.table.program.name'))->component('columns.common.show-title-link'),
            Column::make('type', __('translator::sales.table.program.type')),
            Column::make('id', __('translator::sales.table.program.pos')),
        ];
    }

    public function delete(SalesProgram $program)
    {
        $program->delete();
    }
}
