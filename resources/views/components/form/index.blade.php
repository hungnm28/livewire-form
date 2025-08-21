@props(['title'=>null,"footer"=>null,"tools"=>null])
<div {{$attributes->merge(["class"=>"[:where(&)]:w-full"])}}>
    <div class="w-full flex justify-between items-center px-4 pt-4">
        <div class="flex-1">
            @if($title)
                <span class="text-3xl block">{{$title}}</span>
            @endif
        </div>
        <div class="flex-none flex gap-1 items-center">{{$tools}}</div>
    </div>
    <div class="w-full flex flex-wrap p-4 px-2">{{$slot}}</div>
    @if($footer)
        {{$footer}}
    @endif
</div>
