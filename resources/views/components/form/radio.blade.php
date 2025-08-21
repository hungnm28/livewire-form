@props(['name','label'=>null,'help'=>null,"class"=>null,"data"=>[]])
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class">
    <div class="w-full flex flex-wrap gap-4">
        @foreach($data as $k=>$lb)
            <label class="inline-flex items-center gap-2 cursor-pointer hover:text-primary-500">
                <input type="radio" value="{{$k}}" {{$attributes->merge(['class'=>" hover:border-primary-500 border-gray-300 cursor-pointer size-6 peer  checked:bg-primary-600 accent-primary-600 checked:border-primary-600"])}} />
                <span class="text-lg font-bold peer-checked:text-primary-600">{{$lb}}</span>
            </label>
        @endforeach
    </div>
</x-lf::form.field>
