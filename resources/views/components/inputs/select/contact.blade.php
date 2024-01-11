@props([
    'value',
    'data'
])

@php
    $contacts = \Modules\Contact\Entities\Contact::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="contact">
            {{ $value->label }}
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" id="" class="k_input">
            <option value=""></option>
            @foreach($contacts as $contact)
            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @if(strlen($value->label) > 16)
        <br />
    @endif
</div>
