<?php
use Hungnm28\LivewireForm\Support\ModuleCookie;
use Livewire\Component;

new class extends Component {
    private const MODES = [
        'default' => [
            'label' => 'Default',
            'attribute' => '',
            'icon' => 'ti-layout-sidebar',
        ],
        'primary' => [
            'label' => 'Primary',
            'attribute' => 'data-aside-primary',
            'icon' => 'ti-layout-sidebar-left-expand',
        ],
    ];

    public string $module = 'admin';

    public string $mode;

    public function mount(string $module = 'admin'): void
    {
        $this->module = $module;
        $this->mode = $this->resolveMode();
    }

    public function setMode(string $mode): void
    {
        if (! array_key_exists($mode, self::MODES)) {
            return;
        }

        $this->mode = $mode;

        ModuleCookie::forever($this->module, 'aside_mode', self::MODES[$mode]['attribute']);
    }

    /** @return array<string, array{label: string, attribute: string, icon: string}> */
    public function modes(): array
    {
        return self::MODES;
    }

    public function cookieKey(): string
    {
        return ModuleCookie::key($this->module, 'aside_mode');
    }

    protected function resolveMode(): string
    {
        $attribute = ModuleCookie::get($this->module, 'aside_mode');

        foreach (self::MODES as $mode => $config) {
            if ($config['attribute'] === $attribute) {
                return $mode;
            }
        }

        return 'default';
    }
};

?>
<div
    x-data="{
        apply(attribute) {
            document.body.toggleAttribute('data-aside-primary', attribute === 'data-aside-primary');
        }
    }"
    x-init="apply(@js($this->modes()[$mode]['attribute']))"
    x-effect="apply(@js($this->modes()[$mode]['attribute']))"
    class="w-full rounded-3xl border border-slate-200/70 bg-white/85 p-4 shadow-xl shadow-slate-950/10 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-white/15 dark:shadow-black/20 dark:ring-white/10"
>
    <div class="flex items-start justify-between gap-3">
        <div>
            <span class="block text-sm font-bold text-slate-950 dark:text-white">Menu Mode</span>
            <span class="mt-0.5 block text-xs text-slate-600 dark:text-slate-300">Control sidebar color style</span>
        </div>
        <span class="rounded-full border border-slate-200/70 bg-white/80 px-2.5 py-1 text-xs font-semibold capitalize text-slate-600 shadow-sm backdrop-blur dark:border-white/10 dark:bg-white/15 dark:text-slate-300">{{ $mode }}</span>
    </div>

    <div class="mt-4 grid grid-cols-2 gap-3">
        @foreach($this->modes() as $modeName => $config)
            <button
                type="button"
                wire:click="setMode('{{ $modeName }}')"
                @click="apply(@js($config['attribute']))"
                class="group flex min-h-20 flex-col items-start justify-between rounded-2xl border px-3 py-3 text-left text-sm shadow-sm backdrop-blur-xl transition hover:-translate-y-0.5 hover:border-primary-300/70 hover:bg-white/85 hover:shadow-lg dark:hover:border-primary-300/40 dark:hover:bg-white/20 @if($mode === $modeName) border-primary-300/80 bg-primary-500/15 text-primary-700 ring-1 ring-primary-300/50 dark:bg-primary-400/15 dark:text-primary-200 @else border-slate-200/70 bg-white/85 text-slate-700 dark:border-white/10 dark:bg-white/15 dark:text-slate-300 @endif"
                aria-label="Use {{ $config['label'] }} menu mode"
            >
                <span class="flex h-9 w-9 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/85 text-primary-600 shadow-sm backdrop-blur dark:border-white/10 dark:bg-white/15 dark:text-primary-300">
                    <i class="ti {{ $config['icon'] }} text-xl"></i>
                </span>
                <span class="font-semibold">{{ $config['label'] }}</span>
            </button>
        @endforeach
    </div>
</div>
