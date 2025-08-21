@props([
    "icon"=>'menu',
    "active"=>false,
    "name"=>"",
    "url"=>""
    ,"children"=>[]
])
<li x-data="{active:{{$active?'true':'false'}}}" :data-active="active" {{$attributes}} class="w-full block border-b hover:bg-primary-200 dark:hover:bg-gray-800">
   <span class="w-full flex [[data-active]_&]:bg-primary-600 [[data-active]_&]:text-white hover:bg-primary-500 hover:text-white ">
       <a href="{{$url}}" class="w-full flex-auto flex h-12 items-center">
            <span class="w-14 flex-none flex items-center justify-center"> <x-dynamic-component :component="'lf::icon.' . $icon" /></span>
           <span class="flex-auto hidden [[data-show-aside]_&]:flex text-lg">{{$name}}</span>
       </a>
       @if($children)
       <span @click="active = !active" class="w-8 flex-none flex items-center justify-center cursor-pointer [[data-active]_&]:rotate-90 hover:rotate-90"><x-lf::icon.chevron /></span>
       @endif
   </span>
    @if($children)
    <ul class="w-full pl-14 hidden [[data-show-aside]_[data-active]_&]:md:block">
        @foreach($children as $child)
        <li class="w-full flex border-t">
            <a href="{{$child->url}}"  data-active class="flex flex-auto items-center py-2 hover:underline @if($child->active) underline @endif">
                {{$child->name}}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
