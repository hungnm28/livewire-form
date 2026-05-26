@props([
    'colspan' => 1,
    'icon' => 'database-off',
    'title' => 'No records found.',
    'description' => null,
])

<tr>
    <td colspan="{{ $colspan }}" {{ $attributes->merge(['class' => 'px-4 py-12 text-center']) }}>
        <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-gray-100 text-gray-500 ring-1 ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
            <x-lf::icon.font :name="$icon" class="text-xl" />
        </div>
        <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $title }}</p>
        @if($description)
            <p class="mx-auto mt-1 max-w-sm text-sm leading-5 text-gray-500 dark:text-gray-400">{{ $description }}</p>
        @endif
    </td>
</tr>
