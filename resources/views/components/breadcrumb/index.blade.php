@props(['items' => [], 'separator' => '/'])

<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => 'p-4 py-1']) }}>
    <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
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
                    <a href="{{ $href }}" class="transition hover:text-primary-600 dark:hover:text-primary-400">
                        {{ $label }}
                    </a>
                @else
                    <span @if($isCurrent) aria-current="page" @endif class="{{ $isCurrent ? 'font-medium text-gray-900 dark:text-gray-100' : '' }}">
                        {{ $label }}
                    </span>
                @endif
            </li>

            @if($index < count($items) - 1)
                <li aria-hidden="true" class="text-gray-300 dark:text-gray-600">{{ $separator }}</li>
            @endif
        @endforeach
    </ol>
</nav>
