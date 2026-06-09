@props(['href'])
<x-lf::btn.link {{$attributes->merge(['class'=>'border-sky-700/20 bg-sky-600 text-white shadow-sky-700/30 ring-sky-300/70 hover:bg-sky-500 hover:border-sky-600/30 hover:ring-sky-200 dark:border-sky-300/30 dark:bg-sky-400 dark:text-white dark:shadow-sky-950/45 dark:ring-sky-200/30 dark:hover:bg-sky-300 dark:hover:text-sky-950'])}} :href="$href">{{$slot}}</x-lf::btn.link>
