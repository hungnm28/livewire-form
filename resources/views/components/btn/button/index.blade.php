@props(['type' => 'button'])
@php
    $class = "whitespace-nowrap [:where(&)]:px-6 [:where(&)]:py-3 select-none inline-flex gap-2 items-center justify-center border cursor-pointer disabled:cursor-not-allowed disabled:opacity-50 [:where(&)]:font-bold [:where(&)]:bg-primary-500 [:where(&)]:border-primary-500 [:where(&)]:text-white [:where(&)]:rounded [:where(&)]:hover:bg-primary-600 [:where(&)]:hover:border-primary-600";
@endphp
<button type="{{ $type }}" {{$attributes->merge(['class'=>$class])}}>{{$slot}}</button>
