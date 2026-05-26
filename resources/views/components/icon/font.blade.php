@props([
    'name',
    'tag' => 'i',
])

<x-lf::icon.tabler :name="$name" :tag="$tag" {{ $attributes }} />
