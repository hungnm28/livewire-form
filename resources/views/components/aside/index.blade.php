<aside class="fixed bottom-0 left-0 top-0 z-50 w-0 flex-none -translate-x-full overflow-auto border-r border-slate-200/70 bg-white/85 shadow-2xl shadow-slate-950/10 backdrop-blur-2xl transition-all duration-300 ease-in-out [:where(&)]:bg-white/85 [[data-aside-primary]_&]:border-primary-300/30 [[data-aside-primary]_&]:bg-primary-600/60 dark:border-white/10 dark:bg-slate-950/80 dark:shadow-black/30 [[data-aside-primary]_&]:dark:bg-primary-950/45 md:relative md:w-14 md:translate-x-0 md:overflow-visible [[data-show-aside]_&]:w-80 [[data-show-aside]_&]:translate-x-0">
    <nav class="block w-full p-1.5">
        <ul class="block w-full space-y-1">
            {{$slot}}
        </ul>
    </nav>
</aside>
