@props(['title'=>'','tools'=>''])
<div class="w-full h-14 border-b dark:border-gray-700 dark:bg-gray-900 rounded-t-3xl flex">
    <x-lf::button.text data-action="toggleAside" class="h-full aspect-square rounded-none" icon="menu"></x-lf::button.text>
    <span class="flex-none font-medium h-full items-center flex text-xl px-2">{{$title}}</span>
    <div class="flex-auto h-full flex gap-2">
        {{$slot}}
    </div>
    <div class="flex-none flex gap-1 items-center">
        {{$tools}}
        <x-lf::theme.toogle />
    </div>
</div>
