@props(['header' => null, 'footer' => null, 'tools' => null])

<div {{ $attributes->merge(['class' => '[:where(&)]:w-full overflow-hidden rounded-2xl border border-gray-200 [:where(&)]:bg-white shadow-sm dark:border-gray-800 [:where(&)]:dark:bg-gray-900/50']) }}>
    {{$header}}
    <div class="flex w-full flex-wrap gap-y-1 px-3 py-4 md:px-4">
        {{ $slot }}
    </div>
    {{$footer}}
</div>
