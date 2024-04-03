<div>
    <div class="table-responsive w-100 mb-2">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button>{{ __('Nom du Produit') }}</button></th>
                    <th><button>{{ __('Description') }}</button></th>
                    <th><button>{{ __('Quantité') }}</button></th>
                    <th><button>{{ __('Prix unitaire') }}</button></th>
                    <th><button>{{ __('Réduction') }}</button></th>
                    <th><button>{{ __('Taxe') }}</button></th>
                    <th><button>{{ __('Hors Taxe') }}</button></th>
                    <th><button>{{ __('Toutes taxes comprises') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($cart_items->isNotEmpty())
                    @foreach($cart_items as $cart_item)
                    <tr class="k_field_list_row">
                        <td class="k_field_list">
                            <input type="text"  class="k_input" value="{{ $cart_item->name }}" />
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ $cart_item->options->description }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            @include('livewire.cart.includes.product-cart-quantity')
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->unit_price) }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->product_discount) }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ $cart_item->options->product_tax }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->untaxed_amount) }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->sub_total) }}" class="k_input">
                        </td>
                        <td class="k_field_list cursor-pointer">
                            <span wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                <i class="bi bi-trash"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                @endif

                @foreach($inputs as $key => $value)
                    <tr class="k_field_list_row">
                        <td class="k_field_list">
                            <livewire:search.search-input-text  :special="$key" />
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="description.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="number" wire:model="qty.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="unit_price.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax_exclusion.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax_exclusion.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="subtotal.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list cursor-pointer">
                            <span wire:click.prevent="remove({{$key}})">
                                <i class="bi bi-trash"></i>
                            </span>
                        </td>
                    </tr>
                @endforeach
                @if($status == 'posted')
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        &nbsp;
                    </td>
                </tr>
                @else
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter un produit
                        </span>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Note and total part -->
    <div class="k_group row align-items-start mt-md-0">

        <div class="k_inner_group col-lg-10">
            <div class="k_cell flex-grow-0 flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="5" class="k_input textearea" placeholder="Termes & conditions">
                        {!! $term !!}
                    </textarea>
                </div>
            </div>
        </div>

        <div class="k_inner_group k_subtotal_footer col-lg-2 right overflow-y-auto h-100">

            <td class="k_td_label">
                <span>
                    Total HT
                </span>
            </td>
            <br>
            <td class="k_list_monetary">
                <span>
                    (=) {{ format_currency( (convertToIntSimple(Cart::instance($this->cart_instance)->subtotal) - convertToIntSimple(Cart::instance($this->cart_instance)->tax()) ) / 100 ) }}
                </span>
            </td>
            <br class="mb-2">
            @if($this->global_tax > 0)
                <!-- Taxes -->
                <td class="k_td_label">
                    <label for="" class="k_text_label k_tax_total_label">
                        {{ __('Taxe') }} ({{ sales_tax()->amount }}%) :
                    </label>
                </td>
                <br>
                <td class="k_list_monetary">
                    <span>
                        (+) {{ $global_tax }}
                    </span>
                </td>
                <br>
            @endif

            <!-- Reduction
            <td class="k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    {{ __('Réduction') }} ({{ $global_discount }}%)
                </label>
            </td>
            <br>
            <td class="k_list_monetary">
                <span>
                    (-) {{ format_currency(0) }}
                </span>
            </td>
            <br> -->

            @if($shipping)
                <!-- Livraison -->
                <td class="k_td_label">
                    <label for="" class="k_text_label k_tax_total_label">
                        {{ __('Livraison') }} :
                    </label>
                </td>
                <br>
                <td class="k_list_monetary">
                    <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                    <span>
                        (+) {{ $shipping }}
                    </span>
                </td>
                <br>
            @endif

            <td class="k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    <b>{{ __('Total TTC') }}</b>
                </label>
            </td>
            <br>
            @php
                $total_with_shipping = Cart::instance($cart_instance)->total
            @endphp

            <td class="k_list_monetary">
                <span>
                    (=) {{ $total_with_shipping }}
                </span>
            </td>
        </div>
    </div>
</div>
