@props(['title'=>'','tools'=>null])
<div class="sticky top-0 z-30 flex h-16 w-full items-center justify-between border-b border-haze-100 bg-white/85 px-3  backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/75 dark:shadow-black/20">
    <span class="btn-text size-10 rounded-lg p-0" data-action="toggleAside"><x-lf::icon.font name="menu-2" class="text-xl"/></span>
    <div class="flex h-full flex-auto items-center px-3"><span class="truncate text-base font-bold tracking-tight text-slate-950 dark:text-white">{{ $title }}</span></div>
    <div class="flex flex-none items-center justify-center gap-1.5">
        {{$tools}}
        <x-lf::theme.toogle />
        <label @click="$store.themeSetting.show()" class="btn size-10 rounded-lg p-0"><x-lf::icon.font name="settings" class="text-xl" /></label>
    </div>
</div>
