@props([
    'id' => null,
    'title' => null,
    'header' => null,
    'footer' => null,
    'tools' => null,
    'show' => false,
    'size' => 'md',
    'closeable' => true,
    'closeOnEscape' => true,
    'closeOnClickAway' => true,
])

@php
    $id = $id ?: 'lf-modal-'.uniqid();
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $hasWireModel = filled($wireModel);
    $rootAttributes = $attributes->whereDoesntStartWith('wire:model');

    $sizeClass = match ($size) {
        'sm' => 'max-w-sm',
        'lg' => 'max-w-3xl',
        'xl' => 'max-w-5xl',
        'full' => 'max-w-[calc(100vw-2rem)]',
        default => 'max-w-xl',
    };
@endphp

<div
    id="{{ $id }}"
    @if($hasWireModel)
        x-data="{
            show: @entangle($wireModel),
            close() {
                @if($closeable)
                    this.show = false
                @endif
            }
        }"
    @else
        x-data="{
            show: @js($show),
            close() {
                @if($closeable)
                    this.show = false
                @endif
            }
        }"
    @endif
    x-modelable="show"
    x-on:open-modal.window="if ($event.detail === '{{ $id }}' || $event.detail?.id === '{{ $id }}') show = true"
    x-on:close-modal.window="if ($event.detail === '{{ $id }}' || $event.detail?.id === '{{ $id }}') close()"
    @if($closeOnEscape && $closeable)
        x-on:keydown.escape.window="show && close()"
    @endif
    x-show="show"
    x-cloak
    {{ $rootAttributes->merge(['class' => 'fixed inset-0 z-50 flex items-center justify-center px-4 py-6 sm:px-0']) }}
>
    <div
        x-show="show"
        x-transition.opacity
        class="fixed inset-0 bg-gray-950/60"
        @if($closeOnClickAway && $closeable)
            x-on:click="close()"
        @endif
    ></div>

    <div
        x-show="show"
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="relative z-10 flex max-h-[calc(100vh-3rem)] w-full {{ $sizeClass }} flex-col overflow-hidden rounded-lg bg-white shadow-xl dark:bg-gray-900"
        role="dialog"
        aria-modal="true"
        @if($title && ! $header)
            aria-labelledby="{{ $id }}-title"
        @endif
    >
        <div class="flex flex-none items-center gap-3 border-b border-gray-200 px-4 py-3 dark:border-gray-800">
            <div class="min-w-0 flex-auto">
                @if($header)
                    {{ $header }}
                @elseif($title)
                    <h2 id="{{ $id }}-title" class="truncate text-base font-bold text-gray-900 dark:text-white">
                        {{ $title }}
                    </h2>
                @endif
            </div>

            @if($tools)
                <div class="flex flex-none items-center gap-2">
                    {{ $tools }}
                </div>
            @endif

            @if($closeable)
                <button
                    type="button"
                    class="inline-flex size-9 flex-none items-center justify-center rounded text-gray-500 hover:bg-gray-100 hover:text-gray-800 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="close()"
                    aria-label="Đóng"
                >
                    <x-lf::icon.font name="x" class="text-xl" />
                </button>
            @endif
        </div>

        <div class="flex-auto overflow-y-auto px-4 py-4">
            {{ $slot }}
        </div>

        @if($footer)
            <div class="flex flex-none items-center justify-end gap-2 border-t border-gray-200 px-4 py-3 dark:border-gray-800">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
