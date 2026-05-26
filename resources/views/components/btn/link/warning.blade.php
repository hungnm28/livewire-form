@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'bg-yellow-500 hover:bg-yellow-600 text-gray-900 hover:text-gray-800 hover:border-yellow-600'])}} :href="$href">{{$slot}}</x-lf::btn.link>
