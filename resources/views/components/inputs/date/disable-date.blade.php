@props([
    'value',
    'date'
])
@if($value->model)
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <span class="cursor-pointer" style="color: #017e84; font-weight: 500; padding-left: 10px;" id="date_0">{{ \Carbon\Carbon::parse($this->shipping_date)->isoFormat('Do MMMM YYYY') }}</span>
    </div>
</div>
@endif
