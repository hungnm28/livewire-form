@props(['title'=>'','tools'=>null])
<div class="w-full flex h-14 bg-white dark:bg-gray-900 justify-between items-center px-2 border-b" >
    <x-lf::btn.default class="size-10 text-primary-700 hover:bg-primary-50 hover:text-primary-600" data-action="toggleAside"><x-lf::icon.font name="menu-2" class="text-xl"/></x-lf::btn.default>
    <div class="flex-auto h-full"><span class="font-bold">{{ $title }}</span></div>
    <div class="flex-none flex items-center justify-center gap-1">
        {{$tools}}
        <x-lf::btn.default id="themeToggleIcon"  data-action="cycleTheme" class="size-10">🖥</x-lf::btn.default>
        <x-lf::btn  @click="$store.themeSetting.show()" class="w-10 h-10"><x-lf::icon.font name="settings" class="text-xl" /></x-lf::btn>
    </div>
</div>

