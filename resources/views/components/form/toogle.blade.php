
@props(['label'=>'','value'=>1])
<label class="inline-flex items-center gap-2 cursor-pointer text-gray-700 user-select-none">
    <input {{$attributes->merge(['type'=>'checkbox','class'=>'peer sr-only','value'=>$value])}}/>
    <span class="w-10 h-5 border border-gray-400 p-0.5 rounded-full inline-flex items-center justify-start bg-gray-200 transition-all duration-300 ease-out peer-checked:justify-end peer-checked:border-green-500 peer-checked:bg-green-500 peer-checked:[&>span]:bg-white peer-checked:[&>span]:scale-95 peer-checked:[&>span]:shadow-sm peer-focus-visible:ring-2 peer-focus-visible:ring-green-300 peer-focus-visible:ring-offset-2 peer-disabled:cursor-not-allowed peer-disabled:opacity-60">
        <span class="w-3 h-3 block rounded-full bg-gray-500 transition-all duration-300 ease-out"></span>
    </span>
    <span class="whitespace-nowrap transition-colors duration-300 peer-checked:text-green-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-60">{{$label}}</span>
</label>
