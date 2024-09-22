<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','id'])
<x-table.column.special.contact.simple :value="$value" :id="$id" >

{{ $slot ?? "" }}
</x-table.column.special.contact.simple>