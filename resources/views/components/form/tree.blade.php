@props([])
<div {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-200 bg-slate-50/80 p-4 shadow-sm shadow-slate-950/5 ring-1 ring-inset ring-white/70 backdrop-blur-xl dark:border-white/10 dark:bg-white/10 dark:ring-white/10']) }}>
    {{ $slot ?? '' }}
</div>
