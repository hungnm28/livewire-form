@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'bg-white hover:bg-gray-200 border-gray-200 text-gray-900 hover:text-gray-800 hover:border-gray-300'])}} :href="$href">{{$slot}}</x-lf::btn.link>
