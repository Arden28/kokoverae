<?php

namespace Modules\Manufacturing\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Manufacturing\Entities\MO\ManufacturingOrder;

class ManufacturingOrderTable extends Table
{

    public function createRoute() : string
    {

        return route('manufacturing.orders.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('manufacturing.orders.show' , ['subdomain' => current_company()->domain_name, 'order' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Ordres de fabrication";
    }

    public function emptyTitle() : string
    {
        return __("Aucun ordre de fabrication trouvé. Créons-en un.");
    }

    public function emptyText() : string
    {
        return __("Utilisez les ordres de production pour assembler des produits finis à partir de composants spécifiques. Par exemple, fabriquer un vélo implique l'assemblage d'un cadre, de deux roues, d'un guidon et d'une selle.");
    }

    public function query() : Builder
    {
        return ManufacturingOrder::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', "Référence")->component('columns.common.show-title-link'),
            Column::make('schedule_date', "Début")->component('columns.common.human-diff'),
            Column::make('end_date', "Fin")->component('columns.common.human-diff'),
            Column::make('product_id', "Produit")->component('columns.common.product'),
            Column::make('bom_id', "Nomenclature")->component('columns.common.bom'),
            Column::make('responsible_id', "Responsable")->component('columns.common.customer'),
            Column::make('status', 'Status')->component('columns.common.status.manufacturing-order-status'),
        ];
    }

}
