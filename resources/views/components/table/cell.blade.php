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
        'align-middle text-[0.95rem] leading-6 transition-colors',
        $alignClass,
        $muted ? 'text-slate-500 dark:text-slate-400' : 'text-slate-700 dark:text-slate-200',
        $strong ? 'font-bold text-slate-950 dark:text-white' : '',
        $nowrap ? 'whitespace-nowrap' : '',
    ]));
@endphp

<td {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</td>
