<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Operation\OperationType;

class OperationTransferTable extends Table
{
    #[Url(as : 'type')]
    public $type;

    #[Url(as : 'status')]
    public $status;

    public function mount($type = null){
        if($type){
            $this->type = $type;
        }
    }

    public function createRoute() : string
    {

        return route('inventory.operation-transfers.create' , ['subdomain' => current_company()->domain_name, 'type' => $this->type, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.operation-transfers.show' , ['subdomain' => current_company()->domain_name, 'transfer' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {
        // Set breadcrumb

        return "Opérations de transferts";
    }

    public function emptyTitle() : string
    {
        return __("Aucun transfert trouvé. Créons-en un !");
    }

    public function emptyText() : string
    {
        return __("Les transferts vous permettent de déplacer des produits d'un endroit à un autre.");
    }

    public function query() : Builder
    {
        $type = OperationType::isCompany(current_company()->id)->isType($this->type)->first()->id ?? null;

        $query = OperationTransfer::query();

        if ($type) {
            $query = $query->isOperationType($type);
        }else{
            $query = $query->isOperationType($type);
        }

        if ($this->status) {
            $query->isWating($this->status);
        }


        return $query;
    }

    public function columns() : array
    {
        return [
            Column::make('reference', "Référence")->component('columns.common.show-title-link'),
            Column::make('received_from', "En provenance de ")->component('columns.common.operation.location'),
            Column::make('in_direction_to', "En direction de")->component('columns.common.operation.location'),
            Column::make('responsible_id', "Responsable")->component('columns.common.customer'),
            Column::make('schedule_date', "Date préfue")->component('columns.common.human-diff'),
            Column::make('source_document', "Document d'origine"),
            Column::make('status', "Statut")->component('columns.common.operation.status'),
        ];
    }

    public function delete(OperationTransfer $type)
    {
        // $type = OperationType::find($type);
        $type->delete();
    }
}
