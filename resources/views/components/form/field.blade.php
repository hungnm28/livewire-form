@props(['name' => null, 'label' => '', 'help' => null, 'id' => null, "label_class"=>''])
@php
    $id = $id ?? ($name ? str_replace('.', '_', $name) : null);
@endphp

<div @if($name) @error($name) data-error @enderror @endif {{ $attributes->merge(['class' => '[:where(&)]:w-full group/field block']) }}>
    @if($label)
        <label class="mb-2.5 inline-flex items-center gap-2 text-[0.8rem] font-bold uppercase tracking-[0.08em] text-slate-700 transition-colors group-focus-within/field:text-primary-700 dark:text-slate-200 dark:group-focus-within/field:text-primary-300 {{$label_class}}" @if($id) for="{{ $id }}" @endif>
            {{ $label }}
        </label>
    @endif
    <div class="block w-full flex-auto">
        {{ $slot }}
        <div class="flex min-h-5 w-full items-start justify-between gap-3 px-1 pt-2 text-xs leading-5">
            @if($name)
                @error($name)
                <span class="font-semibold text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            @endif

            @if($help)
                <span class="ml-auto flex-none text-slate-500 dark:text-slate-400">{{ $help }}</span>
            @endif
        </div>
    </div>
</div>
