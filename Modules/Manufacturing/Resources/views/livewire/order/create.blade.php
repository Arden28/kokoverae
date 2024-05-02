<div>
    @section('title', "Nouvel ordre de fabrication")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.manufacturing-order-form-panel :event="'create-manufacturing-order'" />
    @endsection

    <livewire:manufacturing::form.manufacturing-order-form />
</div>
