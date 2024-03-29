@props([
    'value',

])
    <!-- Picking Policy -->
    <div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="{{ $value->key }}">

        <!-- Right pane -->
        <div class="k_setting_right_pane">
            <div class="mt12">
                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                    <span>{{ $value->label }}</span>
                    @if($value->help)
                    <a href="{{ $value->help }}" target="__blank" title="documentation" class="k_doc_link">
                        <i class="bi bi-question-circle-fill"></i>
                    </a>
                    @endif
                </div>
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                    <span>
                        {{ $value->description }}
                    </span>
                </div>
            </div>
            <div class="mt16">
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                    <div class=" content-group">
                        <input id="annual_inventory_day_0 " type="text" class="k_input w-5" wire:model="annual_inventory_day">
                        <select class="k_input w-50" id="" wire:model="annual_inventory_month">
                            <option value=""></option>
                            <option value="january">Janvier</option>
                            <option value="february">Février</option>
                            <option value="march">Mars</option>
                            <option value="april">Avril</option>
                            <option value="may">Mai</option>
                            <option value="june">Juin</option>
                            <option value="jully">Juilet</option>
                            <option value="august">Août</option>
                            <option value="september">Septembre</option>
                            <option value="october">Octobre</option>
                            <option value="november">Novembre</option>
                            <option value="december">Décembre</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>

    </div>
