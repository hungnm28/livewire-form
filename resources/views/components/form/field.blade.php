@props(['name' => null, 'label' => '', 'help' => null, 'id' => null, "label_class"=>''])
@php
    $id = $id ?? ($name ? str_replace('.', '_', $name) : null);
@endphp

<div @if($name) @error($name) data-error @enderror @endif {{ $attributes->merge(['class' => '[:where(&)]:w-full block p-2']) }}>
    @if($label)
        <label class="mb-2 inline-flex gap-2 text-sm font-medium text-gray-800 dark:text-gray-100 {{$label_class}}" @if($id) for="{{ $id }}" @endif>
            {{ $label }}
        </label>
    @endif
    <div class="w-full flex-auto block">
        {{ $slot }}
        <div class="flex w-full items-start justify-between gap-3 px-1 pt-2 text-xs">
            @if($name)
                @error($name)
                <span class="font-medium text-red-500">{{ $message }}</span>
                @enderror
            @endif

            @if($help)
                <span class="ml-auto flex-none text-gray-500 dark:text-gray-400">{{ $help }}</span>
            @endif
        </div>
    </div>
</div>
