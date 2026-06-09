@props(['right'=>null])
<div {{$attributes->merge(['class'=>'flex w-full flex-col gap-3 border-t border-slate-200/80 bg-slate-50/80 p-5 backdrop-blur-xl dark:border-white/10 dark:bg-white/10 sm:flex-row sm:items-center sm:justify-between'])}}>
   <div class="flex flex-auto flex-wrap items-center gap-3"> {{$slot}}</div>
    <div class="flex flex-none flex-wrap items-center justify-end gap-3">{{$right}}</div>
</div>
