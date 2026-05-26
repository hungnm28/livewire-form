@props(['name' => null, 'id' => null, 'placeholder' => null, 'label' => null, 'help' => null, 'class' => null, 'label_class'=>""])
@php
    $name = $attributes->whereStartsWith('wire:model')->first() ?? $name;
    $placeholder = $placeholder ?? ($label ? $label . '...' : null);
    $id = $id ?? ($name ? str_replace('.', '_', $name) : null);
@endphp
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class" :id="$id" :label_class="$label_class">
    <input @if($id) id="{{ $id }}" @endif
           {{ $attributes->merge(['name' => $name, 'class' => 'w-full rounded border border-gray-200 bg-white [:where(&)]:px-3 [:where(&)]:py-2 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-primary-500 focus:ring-4 focus:ring-primary-100 [[data-error]_&]:border-red-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder:text-gray-500 dark:focus:border-primary-400 dark:focus:ring-primary-950']) }}
           placeholder="{{ $placeholder }}"
    />
</x-lf::form.field>
