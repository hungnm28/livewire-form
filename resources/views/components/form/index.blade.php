@props(['header' => null, 'footer' => null, 'tools' => null])

<div {{ $attributes->merge(['class' => '[:where(&)]:w-full overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white/90 shadow-xl shadow-slate-950/8 ring-1 ring-slate-900/5 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/75 dark:shadow-black/25 dark:ring-white/10']) }}>
    {{$header}}
    <div class="grid w-full gap-5 px-5 py-6 md:px-7 md:py-7">
        {{ $slot }}
    </div>
    {{$footer}}
</div>
