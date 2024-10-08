@props([
    'value',

])
<!-- Weight -->
<div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="{{ $value->key }}">

    <!-- Right pane -->
    <div class="k_setting_right_pane">
        <div class="mt12">
            <div>
                <div class="w-auto k_field_widget k_field_chat k_read_only modify ps-3 fw-bold">
                    @if($value->icon)
                        <i class="inline-block bi {{ $value->icon }}"></i>
                    @endif
                    <span class="ml-2">{{ $value->label }}</span>
                    @if($value->help)
                    <a href="{{ $value->help }}" target="__blank" title="documentation" class="k_doc_link">
                        <i class="bi bi-question-circle-fill"></i>
                    </a>
                    @endif
                </div>
                @if($value->description)
                <div class="w-auto k_field_widget k_field_text k_read_only modify ps-3 text-muted">
                    <span>
                        {{ $value->description }}
                    </span>
                </div>
                @endif
            </div>
        </div>
        <div class="mt-12">
            <div class="k_field_widget k_field_radio k_light_label ps-3">
                <div class="k_horizontal">
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" name="{{ $value->model }}" wire:model="{{ $value->model }}" id="kg" value="kilograms"/>
                        <label class="form-check-label k_form_label" for="kg">
                            {{ __('Kg') }}
                        </label>
                    </div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" name="{{ $value->model }}" wire:model="{{ $value->model }}" id="ib" value="pounds"/>
                        <label class="form-check-label k_form_label" for="ib">
                            {{ __('Ib') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>