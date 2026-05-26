@props([
    'name',
    'tag' => 'i',
])

@php
    $classes = trim('ti ti-' . $name . ' leading-none align-middle ' . $attributes->get('class', ''));
@endphp

@if($tag === 'span')
    <span {{ $attributes->except('class')->merge(['class' => $classes]) }}></span>
@elseif($tag === 'div')
    <div {{ $attributes->except('class')->merge(['class' => $classes]) }}></div>
@else
    <i {{ $attributes->except('class')->merge(['class' => $classes]) }}></i>
@endif
