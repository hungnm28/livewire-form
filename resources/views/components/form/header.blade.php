@props(['tools'=>null])
<div {{$attributes->merge(['class'=>'w-full w-full flex justify-between [:where(&)]:bg-white [:where(&)]:text-gray-800 border-b [:where(&)]:h-14 items-center px-4 dark:bg-gray-900'])}}>
    <span class="text-2xl  flex-auto">{{$slot}}</span>
    @if($tools)
        <div class="flex-none flex justify-center gap-2">{{$tools}}</div>
    @endif
</div>
