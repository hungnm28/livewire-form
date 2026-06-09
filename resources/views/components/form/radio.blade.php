@props(['label'=>''])
<label class="group inline-flex cursor-pointer select-none items-center gap-3 text-[0.95rem] font-medium text-slate-700 dark:text-slate-200">
    <input {{$attributes->merge(['type'=>'radio','class'=>'peer sr-only'])}} />
    <span class="flex size-7 items-center justify-center rounded-full border border-slate-300 bg-white shadow-sm shadow-slate-950/5 ring-1 ring-inset ring-transparent transition duration-200 group-hover:border-primary-300 peer-checked:border-primary-600 peer-checked:bg-primary-600 peer-checked:ring-primary-300/50 peer-focus-visible:ring-4 peer-focus-visible:ring-primary-300/25 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 peer-checked:[&_.lf-radio-dot]:opacity-100 dark:border-white/15 dark:bg-slate-900 dark:peer-checked:border-primary-400 dark:peer-checked:bg-primary-400">
        <span class="lf-radio-dot size-2.5 rounded-full bg-white opacity-0 shadow-sm transition"></span>
    </span>
    <span class="whitespace-nowrap transition-colors peer-checked:text-primary-700 peer-disabled:cursor-not-allowed dark:peer-checked:text-primary-300">{{$label}}</span>
</label>
