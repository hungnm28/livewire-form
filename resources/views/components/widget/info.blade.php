@props(['icon'=>'category-filled','title'=>'','value'=>''])
<div {{$attributes->merge(['class'=>'flex-auto inline-flex [:where(&)]:bg-white [:where(&)]:text-gray-700 [:where(&)]:rounded-lg [:where(&)]:shadow p-4 items-center'])}}>
    <div class="flex-none flex items-center justify-center bg-sky-600 text-white rounded p-4 aspect-square">
        <x-lf::icon.font :name="$icon" class="font-bold text-4xl" />
    </div>
    <div class="pl-4 flex-auto block flex-col justify-center">
        <span class="block">{{$title}}</span>
        <span class="block text-3xl font-bold">{{$value}}</span>
    </div>
</div>
