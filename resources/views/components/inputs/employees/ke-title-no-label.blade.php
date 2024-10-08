@props([
    'value',
])
<div>
    <!-- Name -->
    <h1 class="flex-row d-flex align-items-center">
        <input type="text"wire:model="{{ $value->model }}" class="k_input" id="name_k" placeholder="{{ $value->label }}" {{ $this->blocked ? 'disabled' : '' }}>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </h1>
    <!-- Job Title -->
    <h2>
        <input type="text" wire:model="jobTitle" class="k_input w-25" id="job_title" placeholder="Poste de travail">
    </h2>
</div>
