@props(['title'=>'','tools'=>null])
<div class="sticky top-0 z-30 flex h-16 w-full items-center justify-between border-b border-slate-200/70 bg-white/85 px-3 shadow-lg shadow-slate-950/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/75 dark:shadow-black/20">
    <x-lf::btn.default class="size-10 rounded-2xl p-0" data-action="toggleAside"><x-lf::icon.font name="menu-2" class="text-xl"/></x-lf::btn.default>
    <div class="flex h-full flex-auto items-center px-3"><span class="truncate text-base font-bold tracking-tight text-slate-950 dark:text-white">{{ $title }}</span></div>
    <div class="flex flex-none items-center justify-center gap-1.5">
        {{$tools}}
        <x-lf::theme.toogle />
        <x-lf::btn @click="$store.themeSetting.show()" class="size-10 rounded-2xl p-0"><x-lf::icon.font name="settings" class="text-xl" /></x-lf::btn>
    </div>
</div>
