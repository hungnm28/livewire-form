@props(['right'=>null])
<div {{$attributes->merge(['class'=>'w-full p-4 border-t flex justify-between items-center'])}}>
   <div class="flex-auto flex gap-4 items-center"> {{$slot}}</div>
    <div class="flex-none flex gap-4 items-center justify-end">{{$right}}</div>
</div>
