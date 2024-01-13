@props([
    'value',
])
@if($this->sale->transfers->count() >= 1 && module('inventory'))
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-truck"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name]) }}" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value">
            {{ count($this->sale->transfers) }}
        </span>
    </a>
</div>

@endif
