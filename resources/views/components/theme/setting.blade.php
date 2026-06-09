@props([
    'module' => 'admin',
    'showThemeColor' => true,
    'showAsideMode' => true,
])

<script>
    document.addEventListener('alpine:init', () => {
        if (Alpine.store('themeSetting')) {
            return;
        }

        Alpine.store('themeSetting', {
            open: false,
            show() {
                this.open = true;
            },
            hide() {
                this.open = false;
            },
            toggle() {
                this.open = ! this.open;
            },
        });
    });
</script>

<div
    x-cloak
    x-data
    x-show="$store.themeSetting.open"
    @click="$store.themeSetting.hide()"
    @keydown.escape.window="$store.themeSetting.hide()"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex cursor-pointer flex-row-reverse bg-slate-950/45 pl-6 backdrop-blur-md sm:pl-12"
>
    <div
        @click.stop
        class="flex h-full w-full max-w-[28rem] cursor-auto flex-col overflow-hidden rounded-l-[2rem] border-l border-slate-200/70 bg-white/85 shadow-2xl shadow-slate-950/25 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/85 dark:shadow-black/40 dark:ring-white/10"
        x-show="$store.themeSetting.open"
        x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transform transition ease-in duration-300"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="translate-x-full opacity-0"
    >
        <div class="flex w-full border-b border-slate-200/70 bg-white/80 backdrop-blur-xl dark:border-white/10 dark:bg-white/15">
            <div class="flex flex-auto items-center justify-between p-5">
                <div>
                    <span class="block text-base font-bold text-slate-950 dark:text-white">Theme Setting</span>
                    <span class="mt-0.5 block text-xs text-slate-600 dark:text-slate-300">Customize module appearance</span>
                </div>
            </div>
            <div class="flex-none p-2">
                <span @click="$store.themeSetting.hide()" class="flex h-9 w-9 cursor-pointer items-center justify-center rounded-2xl border border-slate-200/70 bg-white/85 text-slate-600 shadow-sm transition hover:bg-white/85 hover:text-slate-950 dark:border-white/10 dark:bg-white/15 dark:text-slate-300 dark:hover:bg-white/20 dark:hover:text-white">
                    <i class="ti ti-x text-lg"></i>
                </span>
            </div>
        </div>

        <div class="w-full flex-1 space-y-4 overflow-y-auto p-4">
            @if($showThemeColor)
                <livewire:lf-theme-setting :module="$module" />
            @endif
            @if($showAsideMode)
                <livewire:lf-aside-mode :module="$module" />
            @endif
        </div>
    </div>
</div>
