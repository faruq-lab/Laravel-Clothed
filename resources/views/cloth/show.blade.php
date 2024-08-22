<x-layout>
    <x-card class="mt-10">
        {{-- this to show single item --}}
        <div class="flex">
            <a href="/" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" src="{{$posting->picture ? asset ('storage/' . $posting->picture) : asset('../images/laravelLogo.png')}}" />
            <h3 class="text-2xl mb-2">
                {{$posting->title}}</h3>
            <div class="text-xl font-bold mb-4">RM {{$posting->price}}</div>
            <div class="flex items-center mb-4">
                <div class="text-xl font-bold mr-2">Color:</div>
                <span class="text-xl">{{$posting->color}}</span>
            </div>
            <div class="flex items-center mb-4">
                <div class="text-xl font-bold mr-2">Brand:</div>
                <span class="text-xl">{{$posting->brand}}</span>
            </div>
            <x-clothing-type :typeCsv="$posting->type" />
            <div class="text-lg my-4">
                <i class="fas fa-map-marked-alt"></i> {{$posting->location}}</i>
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">Item Details</h3>
                <div class="text-lg space-y-6">
                    <p>{{$posting->description}} </p>

                </div>
            </div>
        </div>

    </x-card>
    {{-- <x-card class="mt-4 p-2 flex space-x-6">
        <a href="{{$posting->id}}/edit">
    <i class="fas fa-edit"></i> Edit

    <form method="POST" action="/postings/{{$posting->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fas fa-trash-alt"></i>Delete</button>
    </form>
    </x-card> --}}
</x-layout>
