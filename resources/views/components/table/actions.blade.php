@props([
    'align' => 'right',
])

<x-lf::table.td :align="$align" nowrap {{ $attributes->merge(['class' => 'w-1']) }}>
    <div class="inline-flex items-center justify-end gap-1.5 rounded-2xl border border-slate-200/70 bg-slate-50/80 p-1 shadow-sm shadow-slate-950/5 ring-1 ring-inset ring-white/80 dark:border-white/10 dark:bg-white/10 dark:ring-white/10">
        {{ $slot }}
    </div>
</x-lf::table.td>
