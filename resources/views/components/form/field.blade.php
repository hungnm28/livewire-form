@props(["name",'label'=>"","help"=>null])
<div @error($name) data-error @enderror {{$attributes->merge(['class'=> " [:where(&)]:w-full block data-error:text-red-500 p-2"])}}>
    @if($label)
        <label class="inline-block mb-1">{{$label}}</label>
    @endif
        {{$slot}}
    <div class="w-full flex justify-between text-xs">
        @error($name)
        <span class="text-red-500">
            {{ $message }}
        </span>
        @enderror
        <span></span>
        @if($help)
            <span class="flex-none float-right">{{ $help }}</span>
        @endif
    </div>
</div>
