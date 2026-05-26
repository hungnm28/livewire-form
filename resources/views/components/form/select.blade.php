@props(['name' => null, 'id' => null, 'label' => null, 'help' => null, 'class' => null, 'data' => []])
@php
    $name = $attributes->whereStartsWith('wire:model')->first() ?? $name;
    $id = $id ?? ($name ? str_replace('.', '_', $name) : null);
@endphp
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class" :id="$id">
    <select @if($id) id="{{ $id }}" @endif
        {{ $attributes->merge(['name' => $name, 'class' => 'w-full rounded-lg border border-gray-200 bg-white [:where(&)]:px-4 [:where(&)]:py-3 text-gray-900 outline-none transition focus:border-primary-500 focus:ring-4 focus:ring-primary-100 [[data-error]_&]:border-red-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:focus:border-primary-400 dark:focus:ring-primary-950']) }}>
        @foreach($data as $k=> $lb)
         @if(is_array($lb))
             <optgroup label="{{data_get($lb, 'label', $k)}}">
                    @if(isset($lb['children']) && is_array($lb['children']))
                       @foreach($lb['children'] as $cK=>$cLabel)
                         <option value="{{$cK}}">{{$cLabel}}</option>
                     @endforeach
                 @endif
                </optgroup>
            @else
                <option value="{{$k}}">{{$lb}}</option>
            @endif
        @endforeach
    </select>
</x-lf::form.field>
