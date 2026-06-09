@props(['items' => [], 'separator' => '/'])

<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => 'p-4 py-2']) }}>
    <ol class="inline-flex flex-wrap items-center gap-2 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-sm text-slate-600 shadow-sm shadow-slate-950/10 backdrop-blur-xl dark:border-white/10 dark:bg-white/15 dark:text-slate-300">
        @foreach($items as $index => $item)
            @php
                $label = is_array($item) ? ($item['label'] ?? '') : $item;
                $href = is_array($item) ? ($item['href'] ?? null) : null;
                $isCurrent = is_array($item)
                    ? ($item['current'] ?? ($index === count($items) - 1))
                    : ($index === count($items) - 1);
            @endphp

            <li>
                @if($href && !$isCurrent)
                    <a href="{{ $href }}" class="transition hover:text-primary-600 dark:hover:text-primary-300">
                        {{ $label }}
                    </a>
                @else
                    <span @if($isCurrent) aria-current="page" @endif class="{{ $isCurrent ? 'font-semibold text-slate-950 dark:text-white' : '' }}">
                        {{ $label }}
                    </span>
                @endif
            </li>

            @if($index < count($items) - 1)
                <li aria-hidden="true" class="text-slate-300 dark:text-slate-600">{{ $separator }}</li>
            @endif
        @endforeach
    </ol>
</nav>
