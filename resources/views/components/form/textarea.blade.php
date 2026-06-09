@props(['name' => null, 'id' => null, 'label' => null, 'help' => null, 'class' => null,'rows'=>5, 'placeholder' => null])
@php
    $name = $attributes->whereStartsWith('wire:model')->first() ?? $name;
    $placeholder = $placeholder ?? ($label ? $label . '...' : null);
    $id = $id ?? ($name ? str_replace('.', '_', $name) : null);
@endphp
<x-lf::form.field :name="$name" :label="$label" :help="$help" :class="$class" :id="$id">
    <textarea @if($id) id="{{ $id }}" @endif rows="{{$rows}}" {{ $attributes->merge(['name' => $name])->class('w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-[0.95rem] font-medium text-slate-950 shadow-sm shadow-slate-950/5 outline-none ring-1 ring-inset ring-transparent transition duration-200 placeholder:font-normal placeholder:text-slate-400 hover:border-slate-300 hover:bg-slate-50/70 focus:border-primary-400 focus:bg-white focus:ring-4 focus:ring-primary-400/15 [[data-error]_&]:border-red-400 [[data-error]_&]:ring-red-300/20 dark:border-white/10 dark:bg-slate-900/80 dark:text-slate-100 dark:placeholder:text-slate-500 dark:hover:bg-slate-900 dark:focus:border-primary-300 dark:focus:bg-slate-900 dark:focus:ring-primary-300/15') }} placeholder="{{ $placeholder }}"></textarea>
</x-lf::form.field>
