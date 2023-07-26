@props(["name","label"=>null,"class"=>null])

<x-lf.form.field :name="$name" :label="$label" :class="$class">
    <label class="form-toggle">
        <input type="checkbox" name="{{$name}}" wire:model="{{$name}}" value="1" />
        <span class="dot" title="{{$label}}"></span>
    </label>
</x-lf.form.field>
