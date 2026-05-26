@props(['module'=>'admin'])
@php
$colors = [
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
@endphp
<div
    x-cloak
    x-data
    x-show="$store.themeSetting.open"
    @click="$store.themeSetting.hide()"
    @keydown.escape.window="$store.themeSetting.hide()"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 "
    x-transition:enter-end="opacity-100 "
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"

    class="fixed top-0 left-0 right-0 bottom-0 bg-black/30 bg-opacity-10 z-50 pl-12 flex flex-row-reverse cursor-pointer"
>
    <div @click.stop class="w-full max-w-96 bg-white dark:bg-gray-900 cursor-auto"
         x-show="$store.themeSetting.open"
         x-transition:enter="transform transition ease-out duration-300"
         x-transition:enter-start="translate-x-full opacity-0"
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transform transition ease-in duration-300"
         x-transition:leave-start="translate-x-0 opacity-100"
         x-transition:leave-end="translate-x-full opacity-0"
    >
        <div class="w-full border-b flex">
            <div class="flex-auto flex items-center justify-between p-4"><span class="font-bold">Setting</span></div>
            <div class="flex-none p-2">
                <span @click="$store.themeSetting.hide()" class="w-8 h-8 rounded-full shadow-lg bg-white dark:bg-gray-900 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-800 cursor-pointer"><i class="ti ti-x"></i> </span>
            </div>
        </div>
        <div class="w-full flex flex-wrap gap-2 h-auto p-2">
            @foreach($colors as $color => $class)
                <button
                    type="button"
                    aria-label="Use {{ $color }} theme"
                    data-theme-name="{{ $color }}"
                    class="theme-btn w-10 h-10 {{ $class }} block dark:ring-white"
                ></button>
            @endforeach
        </div>
        <script type="text/javascript">
            (() => {
                const storageKey = @js($module.'-theme-color');

                function updateActiveButton(currentTheme) {
                    document.querySelectorAll('.theme-btn').forEach(btn => {
                        const isActive = btn.getAttribute('data-theme-name') === currentTheme;
                        btn.classList.toggle('ring-2', isActive);
                        btn.classList.toggle('ring-offset-2', isActive);
                    });
                }

                document.addEventListener('DOMContentLoaded', function () {
                    const savedTheme = localStorage.getItem(storageKey) || @js(config('livewire-form.theme', 'orange'));
                    document.body.setAttribute('data-theme', savedTheme);
                    updateActiveButton(savedTheme);

                    document.querySelectorAll('.theme-btn').forEach(btn => {
                        btn.addEventListener('click', function () {
                            const theme = btn.getAttribute('data-theme-name');
                            localStorage.setItem(storageKey, theme);
                            document.body.setAttribute('data-theme', theme);
                            updateActiveButton(theme);
                        });
                    });
                });
            })();
        </script>
    </div>
</div>
