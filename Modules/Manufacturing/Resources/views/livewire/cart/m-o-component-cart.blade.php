<div>
    <!-- Table -->
    <div class="table-responsive card">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th><button class="table-sort">{{ __('Produit') }}</button></th>
                    <th><button class="table-sort">{{ __('Emplacement') }}</button></th>
                    <th><button class="table-sort">{{ __('Quantité à consommer') }}</button></th>
                    <th><button class="table-sort">{{ __('UdM') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $key => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        {{-- <livewire:search.search-input-text wire:model.live="inputs.{{ $key }}.product" :key="$key" /> --}}
                        <select wire:model.live="inputs.{{ $key }}.product" id="" class="k_input">
                            <option value=""></option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        @error("inputs.{{ $key }}.product") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <select wire:model.live="inputs.{{ $key }}.location" id="" class="k_input">
                            <option value=""></option>
                            @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ location_name($location) }}</option>
                            @endforeach
                        </select>
                        @error("inputs.{{ $key }}.product") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.quantity" class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.blur="inputs.{{ $key }}.uom" class="k_input disabled">
                    </td>
                    {{-- <td class="k_field_list">
                        {{ $inputs[$key]['quantity'] * 2 }} {{ $inputs[$key]['product'] }} : {{ $inputs[$key]['quantity'] * 50 }}
                    </td> --}}
                    <td class="k_field_list cursor-pointer">
                        <span wire:click.prevent="remove({{$key}})">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                @endforeach
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
