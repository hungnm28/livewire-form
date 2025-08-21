@props(['name','label'=>null,'help'=>null,"class"=>null,'data'=>[]])
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class">
    <select {{$attributes}}  class="w-full p-2 border rounded [:[data-error]_&]:border-red-500 ">
        @foreach($data as $k=> $lb)
            @if(is_array($lb))
                <optgroup label="{{$lb["$label"]}}">

                </optgroup>
            @else
                <option value="{{$k}}">{{$lb}}</option>
            @endif
        @endforeach
    </select>
</x-lf::form.field>
