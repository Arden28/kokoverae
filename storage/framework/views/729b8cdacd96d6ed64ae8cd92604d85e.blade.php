<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-capsules.warehouse.location.putaway-rules :value="$value" >

{{ $slot ?? "" }}
</x-capsules.warehouse.location.putaway-rules>