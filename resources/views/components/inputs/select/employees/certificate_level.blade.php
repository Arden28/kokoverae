@props([
    'value',
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Payment Terms -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" class="k-autocomplete-input-0 k_input" id="company_id_0" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            <option value="diploma">{{ __('Baccalauréat') }}</option>
            <option value="master">{{ __('Master') }}</option>
            <option value="phd">{{ __('Doctorat') }}</option>
            <option value="others">{{ __('Autre') }}</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
