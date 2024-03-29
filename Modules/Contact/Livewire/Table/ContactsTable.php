<?php

namespace Modules\Contact\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Contact;

class ContactsTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return 'Contacts';
    }

    public function query() : Builder
    {
        return Contact::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', 'Nom')->component('columns.common.show-title-link'),
            Column::make('phone', 'Télephone'),
            Column::make('email', 'Email'),
            Column::make('city', 'Ville'),
            Column::make('country', 'Pays'),
            // Column::make('created_at', 'Rejoinds depuis')->component('columns.common.human-diff'),
        ];
    }
}
