@props(['data'=>[]])

<aside class="fixed bottom-0 left-0 top-0 z-50 w-0 md:w-14 hover:w-80
flex-none -translate-x-full overflow-auto border-r
  backdrop-blur-2xl transition-all duration-300 ease-in-out group
[:where(&)]:bg-white/50 [[data-aside-primary]_&]:border-primary-600 [[data-aside-primary]_&]:bg-primary-600
dark:border-white/10 dark:bg-slate-950/80 [[data-aside-primary]_&]:dark:bg-primary-950/45  md:translate-x-0
[[data-show-aside]_&]:w-80 [[data-show-aside]_&]:translate-x-0  [[data-show-aside]_&]:md:static">
    <nav class="block w-80 p-0">
        <ul class="block w-full overflow-hidden">
            <li class="block w-full border-b border-haze-100 justify-center items-center [[data-aside-primary]_&]:border-primary-700/30">
                <a class="flex-auto w-full flex text-haze-600  dark:text-gray-400 hover:text-primary-600 [[data-aside-primary]_&]:text-white" href="/">
                        <span class="w-14 h-16 flex-none flex items-center justify-center p-1"><span class="w-10 h-10 bg-primary-800 text-white rounded-full flex items-center justify-center text-sm font-bold">AD</span></span>
                    <span class="flex-auto flex items-center pl-2 font-bold text-2xl">Admin</span>
                </a>
            </li>
            @foreach($data as $item)
                <li x-data="{open:{{$item['active']?'true':'false'}}}"
                    class="block group/item  relative w-full border-b border-haze-100 justify-center items-center hover:bg-primary-700/10   [[data-aside-primary]_&]:hover:bg-primary-700/10 [[data-aside-primary]_&]:border-primary-700/30">
                    <span class="w-full flex">
                        <a class="flex-auto w-full flex text-haze-600  dark:text-gray-400 hover:text-primary-600 [[data-aside-primary]_&]:text-white"
                           href="{{$item['href']}}">
                        <span class="w-14 h-16 flex-none flex items-center justify-center">
                            <x-lf::icon.font :name="$item['icon']" class="text-2xl"/>
                        </span>
                        <span class="flex-auto font-medium flex items-center">{{$item['title']}}</span>
                    </a>
                        @if(isset($item['children'])&& !empty($item['children']))
                            <span class="btn-text w-8 h-16 flex-none flex items-center justify-center"
                                  @click="open=!open">
                            <x-lf::icon.font name="chevron-right"
                                             class="text-sm text-haze-600 dark:text-gray-400 transition-transform duration-300 ease-in-out"
                                             x-bin:class="open ? 'rotate-90' : 'rotate-0'"
                            />
                        </span>
                        @endif
                    </span>
                    @if(isset($item['children'])&& !empty($item['children']))
                        <ul x-bind:class="open ? 'block' : 'hidden'" class="w-full  pl-14 group-hover/item:block ">
                            @foreach($item['children'] as $child)
                                <li class="w-full">
                                    <a href="{{$child['href']}}"
                                       class="w-full  border-t border-haze-100 [[data-aside-primary]_&]:border-primary-700/30 py-2 flex gap-2 text-haze-600  dark:text-gray-400 hover:text-primary-600 items-center [[data-aside-primary]_&]:text-white [[data-aside-primary]_&]:hover:text-white">
                                    <span class=" flex-none flex items-center justify-center">
                                        <x-lf::icon.font :name="$child['icon']" class="text-base"/>
                                    </span>
                                        <span class="flex-auto font-medium flex items-center">{{$child['title']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
