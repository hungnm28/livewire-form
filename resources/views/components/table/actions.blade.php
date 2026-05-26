@props([
    'align' => 'right',
])

<x-lf::table.td :align="$align" nowrap {{ $attributes->merge(['class' => 'w-1']) }}>
    <div class="inline-flex items-center justify-end gap-1">
        {{ $slot }}
    </div>
</x-lf::table.td>
