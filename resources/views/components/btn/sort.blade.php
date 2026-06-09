@props([
    'value' => '',
])

@php
    $direction = in_array($value, ['asc', 'desc'], true) ? $value : '';
    $icon = match ($direction) {
        'asc' => 'sort-ascending',
        'desc' => 'sort-descending',
        default => 'arrows-sort',
    };

    $class = trim(
        'inline-flex items-center justify-center gap-1.5 whitespace-nowrap select-none cursor-pointer rounded-xl px-2.5 py-1.5 ' .
        'font-black text-inherit transition hover:bg-white hover:text-primary-700 hover:shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-300 disabled:cursor-not-allowed disabled:opacity-50 dark:hover:bg-white/15 dark:hover:text-primary-300'
    );
@endphp

<button type="button" {{ $attributes->merge(['class' => $class]) }}>
    <span>{{ $slot }}</span>
    <x-lf::icon.font :name="$icon" class="text-base opacity-80" />
</button>
