<div {{$attributes->merge(['class'=>'bg-gray-50 border border-gray-200 rounded p-10'])}} >
    {{$slot}}
</div>

{{--merge here is important to combine this card css with outside customize css--}}