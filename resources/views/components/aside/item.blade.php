@props(['icon'=>'home',"url"=>'#',"title"=>'','active'=>false, 'children'=>[]])
<li x-data="{open:{{$active?'true':'false'}}}"
    class="w-full block border-t border-t-primary-500 dark:border-t-gray-800 border-b border-b-primary-700 dark:border-b-gray-950 relative">
                <span class="w-full flex items-center">
                    <a href="{{$url}}"
                       class="w-full flex-auto  flex items-center text-white  hover:bg-primary-500/20 cursor-pointer">
                    <x-lf::icon.font :name="$icon"
                                     class="w-12 h-12 flex items-center justify-center text-2xl font-thin"/>
                    <span class="flex-auto max-w-0 overflow-hidden whitespace-nowrap opacity-0 translate-x-2 transition-all duration-300 ease-in-out [[data-show-aside]_&]:max-w-[12rem] [[data-show-aside]_&]:opacity-100 [[data-show-aside]_&]:translate-x-0">
                        {{$title}}
                    </span>
                </a>
                    @if($children)
                        <x-lf::icon.font
                                name="chevron-right"
                                class="w-10 h-10 flex justify-center items-center text-white cursor-pointer transition-transform duration-300 ease-in-out"
                                x-bind:class="open ? 'rotate-90' : 'rotate-0'"
                                @click="open=!open"
                        />
                    @endif
                </span>
    @if(!empty($children))
        <ul
                x-bind:class="open ? 'max-h-40 opacity-100 translate-y-0' : 'max-h-0 opacity-0 -translate-y-1'"
                class="w-full overflow-hidden pl-10 transition-all duration-300 ease-in-out hidden [[data-show-aside]_&]:block"
        >
            @foreach($children as $child)
                <li class="w-full">
                    <a href="{{data_get($child,"url","#")}}"
                       class="w-full flex items-center gap-1 p-2 border-t border-t-primary-500 dark:border-t-gray-800 text-white hover:underline">
                        <x-lf::icon.font :name="data_get($child,'icon','plus')" />
                        <span class="flex-auto overflow-hidden whitespace-nowrap {{data_get($child,"active")?'underline':''}}">{{data_get($child,"title")}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</li>
