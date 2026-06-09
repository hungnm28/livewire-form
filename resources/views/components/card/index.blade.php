@props(['title'=>null,'tools'=>null,'footer'=>null])
<div {{$attributes->merge(['class'=>'overflow-hidden rounded-3xl border border-slate-200/70 bg-white/85 shadow-2xl shadow-slate-950/10 ring-1 ring-slate-900/10 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/70 dark:shadow-black/25 dark:ring-white/10'])}}>
    <div class="flex w-full items-center gap-1 border-b border-slate-200/70 bg-white/80 text-slate-950 backdrop-blur-xl dark:border-white/10 dark:bg-white/15 dark:text-white">
        <span class="flex-auto p-4 text-lg font-bold tracking-tight">{{$title}}</span>
        <div class="flex flex-none justify-center gap-1 p-2">{{$tools}}</div>
    </div>
    <div class="flex w-full flex-wrap p-3">{{$slot}}</div>
    @if($footer)
      <div class="flex w-full gap-2 border-t border-slate-200/70 bg-white/85 p-3 backdrop-blur-xl dark:border-white/10 dark:bg-white/15">{{$footer}}</div>
    @endif
</div>
