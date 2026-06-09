@props([
    'selected' => false,
])

@php
    $class = trim(implode(' ', [
        'group',
        $selected ? 'bg-primary-50/80 shadow-[inset_3px_0_0_theme(colors.primary.500)] dark:bg-primary-400/15 dark:shadow-[inset_3px_0_0_theme(colors.primary.300)]' : '',
    ]));
@endphp

<tr {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</tr>
