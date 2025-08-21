@props(['name','label'=>null,'help'=>null,"class"=>null])
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class">
    <textarea {{$attributes}}  class="w-full p-2 border rounded [:[data-error]_&]:border-red-500 " ></textarea>
</x-lf::form.field>
