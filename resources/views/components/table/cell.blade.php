@props([
    'align' => 'left',
    'muted' => false,
    'nowrap' => false,
    'strong' => false,
])

@php
    $alignClass = match ($align) {
        'right' => 'text-right',
        'center' => 'text-center',
        default => 'text-left',
    };

    $class = trim(implode(' ', [
        'align-middle',
        $alignClass,
        $muted ? 'text-gray-500 dark:text-gray-400' : '',
        $strong ? 'font-medium text-gray-950 dark:text-white' : '',
        $nowrap ? 'whitespace-nowrap' : '',
    ]));
@endphp

<td {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</td>
