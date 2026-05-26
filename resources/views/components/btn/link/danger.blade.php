@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'bg-red-600 hover:bg-red-700 border-red-600 text-white hover:border-red-700'])}} :href="$href">{{$slot}}</x-lf::btn.link>
