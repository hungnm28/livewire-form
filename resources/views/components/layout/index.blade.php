@props(['title'=>'Demo','theme'=>config('livewire-form.theme', 'orange'),'head'=>null,'aside'=>null,'author'=>null,'description'=>null,'keywords'=>null])
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:x-lf="http://www.w3.org/1999/html">
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
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @if(config('livewire-form.assets.use_cdn_icons', true))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>
    @endif
    @livewireStyles
    {{$head}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('themeSetting', {
                open: false,
                show() {
                    this.open = true;
                },
                hide() {
                    this.open = false;
                },
            });
        });
    </script>
</head>
<body x-data  class="z-0 relative" data-theme="{{$theme}}">
<div class="w-full min-h-screen bg-primary-300 dark:bg-gray-900 flex z-0 relative">
    {{$aside}}
    <div class="flex-auto relative min-h-screen w-full bg-slate-100 dark:bg-gray-950 overflow-auto items-center border dark:border-gray-600">
        {{$slot}}
    </div>
    <x-lf::aside.overlay />
</div>
<x-lf::theme.setting />

@livewireScripts
</body>
</html>
