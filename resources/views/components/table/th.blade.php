@props([
    'align' => 'left',
    'sortable' => false,
    'direction' => null,
    'nowrap' => true,
])

<x-lf::table.header :align="$align" :sortable="$sortable" :direction="$direction" :nowrap="$nowrap" {{ $attributes }}>
    {{ $slot }}
</x-lf::table.header>
