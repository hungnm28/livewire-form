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
        class="fixed inset-0 bg-slate-950/55 backdrop-blur-md"
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
        class="relative z-10 flex max-h-[calc(100vh-3rem)] w-full {{ $sizeClass }} flex-col overflow-hidden rounded-3xl border border-slate-200/70 bg-white/85 shadow-2xl shadow-slate-950/25 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/85 dark:shadow-black/40 dark:ring-white/10"
        role="dialog"
        aria-modal="true"
        @if($title && ! $header)
            aria-labelledby="{{ $id }}-title"
        @endif
    >
        <div class="flex flex-none items-center gap-3 border-b border-slate-200/70 bg-white/80 px-4 py-3 backdrop-blur-xl dark:border-white/10 dark:bg-white/15">
            <div class="min-w-0 flex-auto">
                @if($header)
                    {{ $header }}
                @elseif($title)
                    <h2 id="{{ $id }}-title" class="truncate text-base font-bold text-slate-950 dark:text-white">
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
                <button type="button" class="inline-flex size-9 flex-none items-center justify-center rounded-2xl border border-slate-200/70 bg-white/80 text-slate-600 shadow-sm transition hover:bg-white/85 hover:text-slate-900 dark:border-white/10 dark:bg-white/15 dark:text-slate-300 dark:hover:bg-white/20 dark:hover:text-white" x-on:click="close()" aria-label="Đóng">
                    <x-lf::icon.font name="x" class="text-xl" />
                </button>
            @endif
        </div>

        <div class="flex-auto overflow-y-auto px-4 py-4">
            {{ $slot }}
        </div>

        @if($footer)
            <div class="flex flex-none items-center justify-end gap-2 border-t border-slate-200/70 bg-white/85 px-4 py-3 backdrop-blur-xl dark:border-white/10 dark:bg-white/15">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
