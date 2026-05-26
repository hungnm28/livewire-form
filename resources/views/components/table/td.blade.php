@props([
    'align' => 'left',
    'muted' => false,
    'nowrap' => false,
    'strong' => false,
])

<x-lf::table.cell :align="$align" :muted="$muted" :nowrap="$nowrap" :strong="$strong" {{ $attributes }}>
    {{ $slot }}
</x-lf::table.cell>
