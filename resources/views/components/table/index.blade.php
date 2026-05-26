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
        'compact' => '[&_td]:px-3 [&_td]:py-2 [&_th]:px-3 [&_th]:py-2',
        'spacious' => '[&_td]:px-5 [&_td]:py-4 [&_th]:px-5 [&_th]:py-3.5',
        default => '[&_td]:px-4 [&_td]:py-3 [&_th]:px-4 [&_th]:py-3',
    };

    $tableClass = trim(implode(' ', [
        'lf-table min-w-full table-auto border-separate border-spacing-0 text-left text-sm text-gray-700 dark:text-gray-200',
        $densityClass,
        $striped ? '[&_tbody_tr:nth-child(even)]:bg-gray-50/60 dark:[&_tbody_tr:nth-child(even)]:bg-gray-900/50' : '',
        $hover ? '[&_tbody_tr]:transition-colors [&_tbody_tr:hover]:bg-primary-50/55 dark:[&_tbody_tr:hover]:bg-primary-950/20' : '',
        $sticky ? '[&_thead]:sticky [&_thead]:top-0 [&_thead]:z-10' : '',
    ]));
@endphp

<section {{ $attributes->merge(['class' => 'w-full overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900']) }}>
    @if($title || $description || $tools)
        <header class="flex flex-col gap-3 border-b border-gray-200 bg-white px-4 py-3 dark:border-gray-800 dark:bg-gray-900 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                @if($title)
                    <h2 class="truncate text-base font-bold text-gray-950 dark:text-white">{{ $title }}</h2>
                @endif

                @if($description)
                    <p class="mt-1 text-sm leading-5 text-gray-500 dark:text-gray-400">{{ $description }}</p>
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
            <div class="absolute inset-0 z-20 flex items-center justify-center bg-white/70 backdrop-blur-[1px] dark:bg-gray-900/70">
                <div class="inline-flex items-center gap-2 rounded-md border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 shadow-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <x-lf::icon.font name="loader-2" class="animate-spin text-base" />
                    <span>{{ $loadingText }}</span>
                </div>
            </div>
        @endif
    </div>

    @if($empty)
        <div class="border-t border-gray-200 px-4 py-12 text-center dark:border-gray-800">
            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-gray-100 text-gray-500 ring-1 ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
                <x-lf::icon.font :name="$emptyIcon" class="text-xl" />
            </div>
            <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $emptyText }}</p>
            @if($emptyDescription)
                <p class="mx-auto mt-1 max-w-sm text-sm leading-5 text-gray-500 dark:text-gray-400">{{ $emptyDescription }}</p>
            @endif
        </div>
    @endif

    @if($footer)
        <footer class="flex flex-col gap-3 border-t border-gray-200 bg-gray-50/60 px-4 py-3 dark:border-gray-800 dark:bg-gray-950/30 sm:flex-row sm:items-center sm:justify-between">
            {{ $footer }}
        </footer>
    @endif
</section>
