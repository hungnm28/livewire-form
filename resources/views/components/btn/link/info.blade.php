@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'bg-sky-500 hover:bg-sky-600 text-white hover:border-sky-600'])}} :href="$href">{{$slot}}</x-lf::btn.link>
