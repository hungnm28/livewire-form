@props(['label'=>'','value'=>1])
<label class="group inline-flex cursor-pointer select-none items-center gap-3 text-[0.95rem] font-medium text-slate-700 dark:text-slate-200">
    <input {{$attributes->merge(['type'=>'checkbox','class'=>'peer sr-only','value'=>$value])}}/>
    <span class="inline-flex h-7 w-12 items-center justify-start rounded-full border border-slate-300 bg-slate-100 p-0.5 shadow-inner shadow-slate-950/5 ring-1 ring-inset ring-transparent transition-all duration-300 ease-out group-hover:border-primary-300 peer-checked:justify-end peer-checked:border-primary-600 peer-checked:bg-primary-600 peer-checked:ring-primary-300/50 peer-focus-visible:ring-4 peer-focus-visible:ring-primary-300/25 peer-disabled:cursor-not-allowed peer-disabled:opacity-60 dark:border-white/15 dark:bg-slate-900 dark:peer-checked:border-primary-400 dark:peer-checked:bg-primary-400">
        <span class="block size-5 rounded-full bg-white shadow-md shadow-slate-950/20 transition-all duration-300 ease-out peer-checked:scale-95"></span>
    </span>
    <span class="whitespace-nowrap transition-colors duration-300 peer-checked:text-primary-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-60 dark:peer-checked:text-primary-300">{{$label}}</span>
</label>
