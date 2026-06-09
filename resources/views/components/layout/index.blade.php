@props(['title'=>'Demo','module'=>'admin','theme_color'=>'orange','aside_mode'=>null ,'head'=>null,'aside'=>null,'author'=>null,'description'=>null,'keywords'=>null])
@php
    $theme = \Hungnm28\LivewireForm\Support\ModuleCookie::get($module, 'theme', 'dark'); // 'dark', 'light', 'system'
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
<div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.95),rgba(226,232,240,0.78)_34%,rgba(203,213,225,0.7)_68%)] dark:bg-[radial-gradient(circle_at_top_left,rgba(30,41,59,0.95),rgba(15,23,42,0.96)_42%,rgba(2,6,23,1)_78%)]">
    <div class="absolute -left-32 top-[-12rem] h-96 w-96 rounded-full bg-primary-300/35 blur-3xl dark:bg-primary-500/20"></div>
    <div class="absolute right-[-8rem] top-24 h-80 w-80 rounded-full bg-cyan-300/25 blur-3xl dark:bg-cyan-500/10"></div>
    <div class="absolute bottom-[-10rem] left-1/3 h-96 w-96 rounded-full bg-white/45 blur-3xl dark:bg-white/5"></div>
</div>
<div class="relative z-0 flex min-h-screen w-full bg-white/10">
    {{$aside}}
    <main class="relative min-h-screen w-full flex-auto border border-slate-200/70 bg-white/80 shadow-2xl shadow-slate-950/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/70 dark:shadow-black/20">
        {{$slot}}
    </main>
    <x-lf::aside.overlay />
</div>
<x-lf::theme.setting :module="$module" />

@livewireScripts
</body>
</html>
