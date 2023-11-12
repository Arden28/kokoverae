@extends('layouts.master')

@section('title', __('Emplois'))

@section('breadcrumb')
<div class="k_control_panel_main d-flex flex-wrap flex-grow-2 flex-nowrap justify-content-between align-items-start gap-5">
    <div class="k_control_panel_breadcumbs d-flex align-items-center gap-1 order-0 h-lg-100">
        <a wire:navigate href="{{ route('employee.jobs.create', ['subdomain' => current_company()->domain_name ]) }}" class="btn btn-outline-primary k_form_button_create">
            {{ __('Nouveau') }}
        </a>
        <br>
        <div class="bread d-flex gap-1 text-truncate">
            <span class="min-w-0 text-truncate" style="font-size: 17px; font-weight: 500;">
                 {{ __('Emplois') }}
                 <i class="bi bi-gear"></i>
            </span>
        </div>
    </div>
</div>
@endsection

@section('content')
<div>
    <livewire:employee::job.lists />
</div>
@endsection
