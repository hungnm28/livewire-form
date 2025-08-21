@props(["char"=>'','name'=>'','url'=>''])
<aside class=" flex-none w-0 md:w-14 z-50 fixed md:static bg-primary-50 dark:bg-gray-900 top-0 bottom-0 left-0 [[data-show-aside]_&]:w-80 hidden md:block [[data-show-aside]_&]:block"
       xmlns:x-lf="http://www.w3.org/1999/html">
    <x-lf::aside.logo :char="$char" :name="$name" :url="$url" />
    <ul class="w-full flex-auto overflow-auto">
        {{$slot}}
    </ul>
</aside>
