@props(['title'=>'Demo','module'=>'admin','theme_color'=>'orange','aside_mode'=>null ,'head'=>null,'aside'=>null,'author'=>null,'description'=>null,'keywords'=>null])
@php
    $theme = \Hungnm28\LivewireForm\Support\ModuleCookie::get($module, 'theme', 'system'); // 'dark', 'light', 'system'
    $theme_color = \Hungnm28\LivewireForm\Support\ModuleCookie::get($module, 'theme_color', $theme_color);
    $aside_mode = \Hungnm28\LivewireForm\Support\ModuleCookie::get($module, 'aside_mode', $aside_mode);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:x-lf="http://www.w3.org/1999/html" class="{{$theme}}" data-module="{{$module}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">
    <style>[x-cloak]{display:none !important;}</style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>
    @if(config('livewire-form.assets.use_cdn_icons', true))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>
    @endif
    @livewireStyles
    {{$head}}
</head>
<body x-data class="relative z-0 min-h-screen overflow-x-hidden font-sans text-slate-900 antialiased dark:text-slate-100" data-theme="{{$theme_color}}" {{$aside_mode}}>
<div class="relative z-0 flex min-h-screen w-full bg-haze-100  pl-14  [[data-show-aside]_&]:pl-0">
    {{$aside}}
    <main class="relative min-h-screen w-full flex-auto bg-haze-100 shadow-2xl shadow-slate-950/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/70 dark:shadow-black/20">
        {{$slot}}
    </main>
    <x-lf::aside.overlay />
</div>
<x-lf::theme.setting :module="$module" />

@livewireScripts
</body>
</html>
