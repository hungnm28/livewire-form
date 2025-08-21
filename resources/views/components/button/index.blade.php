@props(['icon'=>null,'iconRight'=>null,'href'=>null,'type'=>'button','size'=>null])

@php
    $class = "whitespace-nowrap select-none inline-flex gap-2 items-center cursor-pointer disabled:cursor-not-allowed disabled:opacity-50 [:where(&)]:font-bold [:where(&)]:bg-primary-500 [:where(&)]:text-white  [:where(&)]:rounded [:where(&)]:hover:bg-primary-400";
    switch ($size){
        case 'xl':
            $class .= " [:where(&)]:p-6 [:where(&)]:px-8 text-2xl";
             $iconSize = 'size-12';
            break;
        case 'lg':
            $class .= " [:where(&)]:p-4 [:where(&)]:px-6 text-xl";
              $iconSize = 'size-8';
            break;
         case 'sm':
            $class .= " [:where(&)]:p-1 text-sm";
            $iconSize = 'size-5';
            break;
           case 'xs':
            $class .= " [:where(&)]:p-0.5 text-xs";
              $iconSize = 'size-5';
            break;
            default:
                 $class .= " [:where(&)]:p-2 [:where(&)]:px-3";
                  $iconSize = 'size-6';

    }


@endphp


@if($href)
    <a {{$attributes->merge(['class'=>$class])}} href="{{$href}}">@if($icon)
            <x-dynamic-component :component="'lf::icon.' . $icon" :class="$iconSize"/>
        @endif{{$slot}}@if($iconRight)
            <x-dynamic-component :component="'lf::icon.' . $iconRight" :class="$iconSize" />
        @endif</a>

@else
    <button type="{{$type}}" {{$attributes->merge(['class'=>$class])}} >@if($icon)
            <x-dynamic-component :component="'lf::icon.' . $icon" :class="$iconSize"/>
        @endif{{$slot}}@if($iconRight)
            <x-dynamic-component :component="'lf::icon.' . $iconRight" :class="$iconSize"/>
        @endif</button>
@endif
