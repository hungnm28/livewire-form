@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'bg-green-500 hover:bg-green-600 text-white hover:border-green-600'])}} :href="$href">{{$slot}}</x-lf::btn.link>
