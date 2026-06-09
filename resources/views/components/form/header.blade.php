@props(['tools'=>null])
<div {{$attributes->merge(['class'=>'flex min-h-16 w-full items-center justify-between border-b border-slate-200/80 bg-slate-50/80 px-5 py-4 text-slate-950 backdrop-blur-xl dark:border-white/10 dark:bg-white/10 dark:text-white md:px-7'])}}>
    <span class="flex-auto text-xl font-black tracking-tight md:text-2xl">{{$slot}}</span>
    @if($tools)
        <div class="flex flex-none justify-center gap-2">{{$tools}}</div>
    @endif
</div>
