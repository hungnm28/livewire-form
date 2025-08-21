{{-- Credit: Heroicons (https://heroicons.com) --}}

@props([
    'icon' => null,
    'name' => null,
])

@php
    $icon = $name ?? $icon;
@endphp

<x-lf::delegate-component :component="'icon.' . $icon">{{ $slot }}</x-lf::delegate-component>
