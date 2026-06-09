<?php

use Hungnm28\LivewireForm\Support\ModuleCookie;
use Livewire\Component;

new class extends Component {
    private const COLORS = [
        'red' => 'bg-red-500 ring-red-600',
        'orange' => 'bg-orange-500 ring-orange-600',
        'amber' => 'bg-amber-500 ring-amber-600',
        'yellow' => 'bg-yellow-500 ring-yellow-600',
        'lime' => 'bg-lime-500 ring-lime-600',
        'green' => 'bg-green-500 ring-green-600',
        'emerald' => 'bg-emerald-500 ring-emerald-600',
        'teal' => 'bg-teal-500 ring-teal-600',
        'cyan' => 'bg-cyan-500 ring-cyan-600',
        'sky' => 'bg-sky-500 ring-sky-600',
        'blue' => 'bg-blue-500 ring-blue-600',
        'indigo' => 'bg-indigo-500 ring-indigo-600',
        'violet' => 'bg-violet-500 ring-violet-600',
        'purple' => 'bg-purple-500 ring-purple-600',
        'fuchsia' => 'bg-fuchsia-500 ring-fuchsia-600',
        'pink' => 'bg-pink-500 ring-pink-600',
        'rose' => 'bg-rose-500 ring-rose-600',
    ];

    public string $module = 'admin';

    public string $theme;

    public function mount(string $module = 'admin'): void
    {
        $this->module = $module;
        $this->theme = $this->resolveTheme();
    }

    public function setTheme(string $theme): void
    {
        if (! array_key_exists($theme, self::COLORS)) {
            return;
        }

        $this->theme = $theme;

        ModuleCookie::forever($this->module, 'theme_color', $theme);
    }

    public function cookieKey(): string
    {
        return ModuleCookie::key($this->module, 'theme_color');
    }

    /** @return array<string, string> */
    public function colors(): array
    {
        return self::COLORS;
    }

    protected function resolveTheme(): string
    {
        $theme = ModuleCookie::get($this->module, 'theme_color');

        return array_key_exists($theme, self::COLORS) ? $theme : 'orange';
    }
};

?>

<div
    x-data
    x-init="document.body.setAttribute('data-theme', @js($theme))"
    x-effect="document.body.setAttribute('data-theme', @js($theme))"
    class="w-full rounded-3xl border border-slate-200/70 bg-white/85 p-4 shadow-xl shadow-slate-950/10 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-white/15 dark:shadow-black/20 dark:ring-white/10"
>
    <div class="flex items-start justify-between gap-3">
        <div>
            <span class="block text-sm font-bold text-slate-950 dark:text-white">Theme Color</span>
            <span class="mt-0.5 block text-xs text-slate-600 dark:text-slate-300">Choose the accent color</span>
        </div>
        <span class="rounded-full border border-slate-200/70 bg-white/80 px-2.5 py-1 text-xs font-semibold capitalize text-slate-600 shadow-sm backdrop-blur dark:border-white/10 dark:bg-white/15 dark:text-slate-300">{{ $theme }}</span>
    </div>

    <div class="mt-4 grid grid-cols-6 gap-2">
        @foreach($this->colors() as $color => $class)
            <button
                type="button"
                aria-label="Use {{ $color }} theme"
                wire:click="setTheme('{{ $color }}')"
                @click="document.body.setAttribute('data-theme', '{{ $color }}')"
                class="theme-btn group relative h-10 overflow-hidden rounded-2xl border border-slate-200/70 {{ $class }} shadow-sm shadow-slate-950/10 transition hover:-translate-y-0.5 hover:shadow-lg dark:border-white/10 dark:ring-white @if($theme === $color) ring-2 ring-offset-2 ring-offset-white dark:ring-offset-slate-950 @endif"
            >
                <span class="pointer-events-none absolute inset-0 bg-gradient-to-br from-white/45 via-white/10 to-transparent opacity-80"></span>
                @if($theme === $color)
                    <span class="absolute inset-0 flex items-center justify-center text-white drop-shadow">
                        <i class="ti ti-check text-lg"></i>
                    </span>
                @endif
            </button>
        @endforeach
    </div>
</div>
