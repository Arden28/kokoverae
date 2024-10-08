@props([
    'value',

])
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer Portal -->
    <div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="{{ $value->key }}">

        <!-- Left pane -->
        <div class="k_setting_left_pane">
            <div class="k_field_widget k_field_boolean">
                <div class="k-checkbox form-check d-inline-block">
                    <input type="checkbox" wire:model.live="{{ $value->model }}" class="form-check-input" style="color: #0E6163" onclick="checkStatus(this)" {{ $this->blocked ? 'disabled' : '' }}>
                </div>
            </div>
        </div>
        <!-- Right pane -->
        <div class="k_setting_right_pane">
            <div class="mt12">
                <div class="w-auto k_field_widget k_field_chat k_read_only modify ps-3 fw-bold">
                    <span>{{ $value->label }}</span>
                    @if($value->help)
                    <a title="{{ $value->help }}" class="k_doc_link">
                        <i class="bi bi-question-circle-fill"></i>
                    </a>
                    @endif
                </div>
                <div class="w-auto k_field_widget k_field_text k_read_only modify ps-3 text-muted">
                    <span>
                        {{ $value->placeholder }}
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>

