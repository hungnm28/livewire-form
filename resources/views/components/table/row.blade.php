@props([
    'selected' => false,
])

@php
    $class = trim(implode(' ', [
        'group',
        $selected ? 'bg-primary-50/80 dark:bg-primary-950/30' : '',
    ]));
@endphp

<tr {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</tr>
