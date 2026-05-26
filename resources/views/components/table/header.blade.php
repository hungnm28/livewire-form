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

<th scope="col" {{ $attributes->merge(['class' => trim('border-b border-gray-200 align-middle dark:border-gray-800 '.$alignClass.' '.($nowrap ? 'whitespace-nowrap' : ''))]) }}>
    @if($sortable)
        <button type="button" class="inline-flex items-center gap-1 rounded text-inherit transition hover:text-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-200 dark:hover:text-primary-400 dark:focus:ring-primary-900">
            <span>{{ $slot }}</span>
            <x-lf::icon.font :name="$icon" class="text-sm opacity-75" />
        </button>
    @else
        {{ $slot }}
    @endif
</th>
