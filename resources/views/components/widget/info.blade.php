@props(['icon'=>'category-filled','title'=>'','value'=>''])
<div {{$attributes->merge(['class'=>'relative flex-auto overflow-hidden rounded-3xl border border-slate-200/70 bg-white/85 p-4 shadow-2xl shadow-slate-950/10 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/70 dark:shadow-black/25 dark:ring-white/10 inline-flex items-center'])}}>
    <div class="pointer-events-none absolute -right-8 -top-8 size-24 rounded-full bg-sky-300/25 blur-2xl dark:bg-sky-400/15"></div>
    <div class="relative flex aspect-square flex-none items-center justify-center rounded-2xl border border-sky-200/70 bg-sky-500/85 p-4 text-white shadow-lg shadow-sky-700/20 backdrop-blur-xl dark:border-sky-200/30 dark:bg-sky-400/75">
        <x-lf::icon.font :name="$icon" class="text-4xl font-bold" />
    </div>
    <div class="relative block flex-auto flex-col justify-center pl-4">
        <span class="block text-sm font-medium text-slate-600 dark:text-slate-300">{{$title}}</span>
        <span class="block text-3xl font-bold text-slate-950 dark:text-white">{{$value}}</span>
    </div>
</div>
