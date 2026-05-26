@props(['name' => null, 'id' => null, 'label' => null, 'help' => null, 'class' => null,'rows'=>5, 'placeholder' => null])
@php
    $name = $attributes->whereStartsWith('wire:model')->first() ?? $name;
    $placeholder = $placeholder ?? ($label ? $label . '...' : null);
    $id = $id ?? ($name ? str_replace('.', '_', $name) : null);
@endphp
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class" :id="$id">
    <textarea @if($id) id="{{ $id }}" @endif rows="{{$rows}}" {{ $attributes->merge(['name' => $name])->class('w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-primary-500 focus:ring-4 focus:ring-primary-100 [[data-error]_&]:border-red-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder:text-gray-500 dark:focus:border-primary-400 dark:focus:ring-primary-950') }} placeholder="{{ $placeholder }}"></textarea>
</x-lf::form.field>
