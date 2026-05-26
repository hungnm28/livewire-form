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
        'inline-flex items-center justify-center gap-1 whitespace-nowrap select-none cursor-pointer ' .
        'font-bold text-inherit hover:text-primary-600 disabled:cursor-not-allowed disabled:opacity-50'
    );
@endphp

<button type="button" {{ $attributes->merge(['class' => $class]) }}>
    <span>{{ $slot }}</span>
    <x-lf::icon.font :name="$icon" class="text-base" />
</button>
