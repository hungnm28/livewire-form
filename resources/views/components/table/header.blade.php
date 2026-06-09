@props([
    'align' => 'left',
    'sortable' => false,
    'direction' => null,
    'nowrap' => true,
])

@php
    $alignClass = match ($align) {
        'right' => 'text-right',
        'center' => 'text-center',
        default => 'text-left',
    };

    $icon = match ($direction) {
        'asc' => 'sort-ascending',
        'desc' => 'sort-descending',
        default => 'arrows-sort',
    };
@endphp

<th scope="col" {{ $attributes->merge(['class' => trim('border-b border-slate-200/80 align-middle dark:border-white/10 '.$alignClass.' '.($nowrap ? 'whitespace-nowrap' : ''))]) }}>
    @if($sortable)
        <button type="button" class="inline-flex items-center gap-1.5 rounded-xl px-2.5 py-1.5 text-inherit transition hover:bg-white hover:text-primary-700 hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-300 dark:hover:bg-white/15 dark:hover:text-primary-300">
            <span>{{ $slot }}</span>
            <x-lf::icon.font :name="$icon" class="text-sm opacity-80" />
        </button>
    @else
        {{ $slot }}
    @endif
</th>
