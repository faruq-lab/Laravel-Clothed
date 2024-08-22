@props(['typeCsv'])

@php
    $type = explode(',', $typeCsv);  //to split it by coma, make it as array

@endphp
<ul class="flex">
    @foreach($type as $type)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-3 text-xs">
                        <a href="/?type={{$type}}">{{$type}}</a>
        </li>
    @endforeach
                    
</ul>