@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'bg-blue-500 border-blue-500 hover:bg-blue-600 text-white hover:border-blue-600'])}} :href="$href">{{$slot}}</x-lf::btn.link>
