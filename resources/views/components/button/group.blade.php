@props([])
<div class="flex group m-2 gap-0
  [&>*:not(:last-child)]:rounded-r-none
  [&>*:not(:last-child)]:border-r-0
  [&>*:not(:first-child)]:rounded-l-none
  ">
    {{$slot}}
</div>
