@props(['posting'])
<x-card >
    <div class="flex">
        <img class="hidded w-48 mr-6 md:block" src="{{$posting->picture ? asset ('storage/' . $posting->picture) : asset('../images/laravelLogo.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/postings/{{$posting->id}}">{{$posting->title}}</a> {{--called from database--}}
            </h3>
            <div class="yexy-xl font-bold mb-4">RM {{$posting->price}}</div>
            <div class="yexy-xl font-bold mb-4">{{$posting->brand}}</div>
            <x-clothing-type :typeCsv="$posting->type" />
            <div class="text-lg mt-4">
                <i class="fas fa-map-marked-alt"></i> {{$posting->location}}
            </div>
        </div>
    </div>
</x-card>
