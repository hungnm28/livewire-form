@props([
    'title' => null,
    'description' => null,
    'tools' => null,
    'footer' => null,
    'empty' => false,
    'emptyText' => 'No records found.',
    'emptyDescription' => null,
    'emptyIcon' => 'database-off',
    'striped' => false,
    'hover' => true,
    'density' => 'comfortable',
    'compact' => null,
    'sticky' => false,
    'loading' => false,
    'loadingText' => 'Loading...',
])

@php
    if ($compact !== null) {
        $density = $compact ? 'compact' : 'comfortable';
    }

    $densityClass = match ($density) {
        'compact' => '[&_td]:px-4 [&_td]:py-2.5 [&_th]:px-4 [&_th]:py-3',
        'spacious' => '[&_td]:px-6 [&_td]:py-5 [&_th]:px-6 [&_th]:py-4',
        default => '[&_td]:px-5 [&_td]:py-4 [&_th]:px-5 [&_th]:py-3.5',
    };

    $tableClass = trim(implode(' ', [
        'lf-table min-w-full table-auto border-separate border-spacing-0 text-left text-sm text-slate-700 dark:text-slate-200',
        $densityClass,
        '[&_tbody_td]:border-b [&_tbody_td]:border-slate-100 dark:[&_tbody_td]:border-white/10',
        $striped ? '[&_tbody_tr:nth-child(even)]:bg-slate-50/60 dark:[&_tbody_tr:nth-child(even)]:bg-white/[0.03]' : '',
        $hover ? '[&_tbody_tr]:transition-all [&_tbody_tr:hover]:bg-primary-50/60 [&_tbody_tr:hover]:shadow-[inset_3px_0_0_theme(colors.primary.500)] dark:[&_tbody_tr:hover]:bg-primary-400/10 dark:[&_tbody_tr:hover]:shadow-[inset_3px_0_0_theme(colors.primary.300)]' : '',
        $sticky ? '[&_thead]:sticky [&_thead]:top-0 [&_thead]:z-10' : '',
    ]));
@endphp

<section {{ $attributes->merge(['class' => 'w-full overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white/90 shadow-xl shadow-slate-950/8 ring-1 ring-slate-900/5 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/75 dark:shadow-black/25 dark:ring-white/10']) }}>
    @if($title || $description || $tools)
        <header class="flex flex-col gap-3 border-b border-slate-200/80 bg-slate-50/80 px-5 py-4 backdrop-blur-xl dark:border-white/10 dark:bg-white/10 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                @if($title)
                    <h2 class="truncate text-lg font-black tracking-tight text-slate-950 dark:text-white">{{ $title }}</h2>
                @endif

                @if($description)
                    <p class="mt-1 text-sm leading-5 text-slate-500 dark:text-slate-400">{{ $description }}</p>
                @endif
            </div>

            @if($tools)
                <div class="flex flex-none flex-wrap items-center justify-start gap-2 sm:justify-end">
                    {{ $tools }}
                </div>
            @endif
        </header>
    @endif

    <div class="relative w-full overflow-x-auto">
        <table class="{{ $tableClass }}">
            {{ $slot }}
        </table>

        @if($loading)
            <div class="absolute inset-0 z-20 flex items-center justify-center bg-white/80 backdrop-blur-md dark:bg-slate-950/80">
                <div class="inline-flex items-center gap-2 rounded-2xl border border-slate-200/80 bg-white px-4 py-2.5 text-sm font-bold text-slate-700 shadow-xl shadow-slate-950/10 ring-1 ring-slate-900/5 dark:border-white/10 dark:bg-slate-900 dark:text-slate-200 dark:ring-white/10">
                    <x-lf::icon.font name="loader-2" class="animate-spin text-base text-primary-600 dark:text-primary-300" />
                    <span>{{ $loadingText }}</span>
                </div>
            </div>
        @endif
    </div>

    @if($empty)
        <div class="border-t border-slate-200/80 px-5 py-14 text-center dark:border-white/10">
            <div class="mx-auto flex size-14 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-500 shadow-sm shadow-slate-950/5 ring-1 ring-inset ring-white dark:border-white/10 dark:bg-white/10 dark:text-slate-300 dark:ring-white/10">
                <x-lf::icon.font :name="$emptyIcon" class="text-2xl" />
            </div>
            <p class="mt-4 text-sm font-bold text-slate-800 dark:text-slate-100">{{ $emptyText }}</p>
            @if($emptyDescription)
                <p class="mx-auto mt-1 max-w-sm text-sm leading-5 text-slate-500 dark:text-slate-400">{{ $emptyDescription }}</p>
            @endif
        </div>
    @endif

    @if($footer)
        <footer class="flex flex-col gap-3 border-t border-slate-200/80 bg-slate-50/80 px-5 py-4 backdrop-blur-xl dark:border-white/10 dark:bg-white/10 sm:flex-row sm:items-center sm:justify-between">
            {{ $footer }}
        </footer>
    @endif
</section>
