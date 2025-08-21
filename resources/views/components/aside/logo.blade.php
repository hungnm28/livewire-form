@props(['char'=>'','name'=>'',"url"=>''])
<div class="w-full flex items-center border-b">
    <a href="{{$url}}" title="{{$name}}" class="h-14 flex-auto p-2 flex items-center gap-2">
        <span class="w-10 flex-none shadow aspect-square rounded-full bg-primary-500 text-white font-medium text-2xl flex items-center justify-center">{{$char}}</span>
        <span class="flex-auto text-lg font-bold text-gray-700 dark:text-gray-50  hidden  [[data-show-aside]_&]:block" >{{$name}}</span>
    </a>
    <span data-action="closeAside" class="h-14 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-50 flex-none items-center w-12 flex items-center justify-center hidden   [[data-show-aside]_&]:flex  [[data-show-aside]_&]:md:hidden"><x-lf::icon.arrow-back class="size-4" /></span>
</div>
