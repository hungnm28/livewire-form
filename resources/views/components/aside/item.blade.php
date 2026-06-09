@props(['icon'=>'home',"url"=>'#',"title"=>'','active'=>false, 'children'=>[]])
<li x-data="{open:{{$active?'true':'false'}}}" class="group relative block w-full">
    <span class="flex w-full items-center overflow-hidden rounded-2xl border border-transparent transition hover:border-slate-200/70 hover:bg-white/85 hover:shadow-lg hover:shadow-slate-950/10 [[data-aside-primary]_&]:hover:border-white/30 [[data-aside-primary]_&]:hover:bg-white/15 [[data-aside-primary]_&]:hover:shadow-black/10 dark:hover:border-white/10 dark:hover:bg-white/20">
        <a href="{{$url}}" class="flex w-full flex-auto cursor-pointer items-center text-slate-800 transition hover:text-primary-700 dark:text-slate-100 dark:hover:text-primary-200 [[data-aside-primary]_&]:text-white">
            <x-lf::icon.font :name="$icon" class="flex h-12 w-12 items-center justify-center text-2xl font-thin"/>
            <span class="max-w-0 flex-auto translate-x-2 overflow-hidden whitespace-nowrap font-medium opacity-0 transition-all duration-300 ease-in-out [[data-show-aside]_&]:max-w-[12rem] [[data-show-aside]_&]:translate-x-0 [[data-show-aside]_&]:opacity-100">
                {{$title}}
            </span>
        </a>
        @if($children)
            <x-lf::icon.font
                name="chevron-right"
                class="flex h-10 w-10 cursor-pointer items-center justify-center text-slate-600 transition-transform duration-300 ease-in-out dark:text-slate-300 [[data-aside-primary]_&]:text-white"
                x-bind:class="open ? 'rotate-90' : 'rotate-0'"
                @click="open=!open"
            />
        @endif
    </span>
    @if(!empty($children))
        <ul
            x-bind:class="open ? 'max-h-40 opacity-100 translate-y-0' : 'max-h-0 opacity-0 -translate-y-1'"
            class="hidden w-full overflow-hidden pl-10 transition-all duration-300 ease-in-out [[data-show-aside]_&]:block"
        >
            @foreach($children as $child)
                <li class="w-full pt-1">
                    <a href="{{data_get($child,"url","#")}}" class="flex w-full items-center gap-2 rounded-xl border border-slate-200/70 bg-white/85 p-2 text-sm text-slate-700 backdrop-blur transition hover:bg-white/85 hover:text-primary-700 dark:border-white/10 dark:bg-white/15 dark:text-slate-200 dark:hover:bg-white/20 [[data-aside-primary]_&]:border-white/20 [[data-aside-primary]_&]:bg-white/10 [[data-aside-primary]_&]:text-white [[data-aside-primary]_&]:hover:bg-white/20 [[data-aside-primary]_&]:hover:text-white">
                        <x-lf::icon.font :name="data_get($child,'icon','plus')" />
                        <span class="flex-auto overflow-hidden whitespace-nowrap {{data_get($child,"active")?'font-semibold text-primary-700 underline dark:text-primary-200':''}}">{{data_get($child,"title")}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</li>
