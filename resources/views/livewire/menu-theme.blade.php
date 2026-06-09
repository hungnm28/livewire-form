<?php

use Livewire\Component;

new class extends Component {
    public string $module = 'admin';

    public bool $showFullscreen = true;
};

?>

@php
    $baseButtonClass = 'group relative inline-flex h-11 w-11 items-center justify-center overflow-hidden rounded-2xl ring-1 transition-all duration-300 ease-out before:absolute before:inset-0 before:rounded-2xl before:bg-gradient-to-br before:from-white/80 before:via-white/30 before:to-transparent before:opacity-80 before:transition-opacity after:absolute after:inset-px after:rounded-[1rem] after:bg-white/40 after:opacity-0 after:transition-opacity focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-400 focus-visible:ring-offset-2 focus-visible:ring-offset-white hover:-translate-y-0.5 hover:scale-[1.02] hover:before:opacity-100 hover:after:opacity-100 active:translate-y-0 active:scale-95 dark:before:from-white/20 dark:before:via-white/5 dark:after:bg-white/10 dark:focus-visible:ring-primary-300 dark:focus-visible:ring-offset-gray-950';
    $softButtonClass = $baseButtonClass.' bg-white text-slate-900 shadow-xl shadow-slate-950/20 ring-slate-300/90 backdrop-blur-xl hover:bg-white hover:text-primary-700 hover:shadow-primary-950/20 hover:ring-primary-300/80 dark:bg-slate-800 dark:text-slate-100 dark:shadow-black/35 dark:ring-white/15 dark:hover:bg-slate-800 dark:hover:text-primary-200 dark:hover:ring-primary-300/45';
    $primaryButtonClass = $baseButtonClass.' bg-primary-600 text-white shadow-xl shadow-primary-700/35 ring-primary-300/90 backdrop-blur-xl hover:bg-primary-500 hover:shadow-primary-700/40 hover:ring-white dark:bg-primary-400 dark:text-white dark:shadow-primary-950/45 dark:ring-primary-200/40 dark:hover:bg-primary-400 dark:hover:ring-primary-100/60';
    $iconClass = 'relative z-10 text-xl drop-shadow-sm transition-transform duration-300 group-hover:scale-110';
@endphp

<div class="relative inline-flex items-center">
    <div class="absolute -inset-1 rounded-[1.7rem] bg-gradient-to-r from-primary-400/25 via-sky-300/20 to-cyan-300/20 blur-xl dark:from-primary-400/25 dark:via-cyan-400/10 dark:to-blue-400/20"></div>

    <div class="relative inline-flex items-center gap-1.5 overflow-hidden rounded-[1.45rem] border border-slate-200/80 bg-white/85 p-1.5 shadow-2xl shadow-slate-950/15 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-gray-950/85 dark:shadow-black/35 dark:ring-white/15">
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-white/70 via-white/25 to-transparent dark:from-white/10 dark:via-white/5 dark:to-transparent"></div>
        <div class="pointer-events-none absolute inset-x-3 top-0 h-px bg-gradient-to-r from-transparent via-white to-transparent dark:via-white/40"></div>

        <button
            type="button"
            data-action="cycleTheme"
            class="{{ $softButtonClass }}"
            aria-label="Cycle theme"
        >
            <i data-theme-toggle-icon class="{{ $iconClass }} ti ti-device-desktop" aria-hidden="true"></i>
        </button>

        @if($showFullscreen)
            <button
                type="button"
                data-action="toggleFullscreen"
                class="{{ $softButtonClass }}"
                aria-label="Toggle fullscreen"
            >
                <i class="{{ $iconClass }} ti ti-maximize" aria-hidden="true"></i>
            </button>
        @endif

        <button
            type="button"
            @click="$store.themeSetting.show()"
            class="{{ $primaryButtonClass }}"
            aria-label="Open theme settings"
        >
            <i class="{{ $iconClass }} ti ti-adjustments-horizontal group-hover:rotate-12" aria-hidden="true"></i>
        </button>
    </div>
</div>
