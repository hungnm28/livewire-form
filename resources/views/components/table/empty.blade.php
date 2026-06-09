@props([
    'colspan' => 1,
    'icon' => 'database-off',
    'title' => 'No records found.',
    'description' => null,
])

<tr>
    <td colspan="{{ $colspan }}" {{ $attributes->merge(['class' => 'px-5 py-14 text-center']) }}>
        <div class="mx-auto flex size-14 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-500 shadow-sm shadow-slate-950/5 ring-1 ring-inset ring-white dark:border-white/10 dark:bg-white/10 dark:text-slate-300 dark:ring-white/10">
            <x-lf::icon.font :name="$icon" class="text-2xl" />
        </div>
        <p class="mt-4 text-sm font-bold text-slate-800 dark:text-slate-100">{{ $title }}</p>
        @if($description)
            <p class="mx-auto mt-1 max-w-sm text-sm leading-5 text-slate-500 dark:text-slate-400">{{ $description }}</p>
        @endif
    </td>
</tr>
