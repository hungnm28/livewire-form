@props(['title'=>null,'tools'=>null,'footer'=>null])
<div {{$attributes->merge(['class'=>'[:where(&)]:bg-white [:where(&)]:rounded overflow-hidden [:where(&)]:shadow'])}}>
    <div class="w-full text-white bg-primary-500 flex justify-center gap-1">
        <span class="flex-auto p-3 px-4 text-lg font-bold">{{$title}}</span>
        <div class="flex-none flex justify-center gap-1">{{$tools}}</div>
    </div>
    <div class="w-full flex flex-wrap p-2">{{$slot}}</div>
    @if($footer)
      <div class="w-full border-t p-2 flex gap-2">{{$footer}}</div>
    @endif
</div>
