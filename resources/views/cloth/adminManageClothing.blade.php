<x-admin-layout>
<div class="flex flex-wrap justify-center">

        <!-- Item Details -->
        <div class="w-full md:w-1/2 p-4">
            <x-card class="mt-10">
                <div class="flex flex-col items-center justify-center text-center">
                    <img class="w-48 mr-6 mb-6" src="{{$posting->picture ? asset ('storage/' . $posting->picture) : asset('../images/laravelLogo.png')}}" />
                    <h3 class="text-2xl mb-2">
                        {{$posting->title}}</h3>
                    <div class="text-xl font-bold mb-4">RM {{$posting->price}}</div>
                    <div class="flex items-center mb-4">
                        <div class="text-xl font-bold mr-2">Color:</div>
                        <span class="text-xl">{{$posting->color}}</span>
                    </div>
                    <x-clothing-type :typeCsv="$posting->type" />
                    <div class="text-lg my-4">
                        <i class="fas fa-map-marked-alt"></i> {{$posting->location}}</i>
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">Item Details</h3>
                        <div class="text-lg space-y-6">
                            <p>{{$posting->description}}</p>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Update Form -->
        <div class="w-full md:w-1/2 p-4">
            <x-card class="mx-auto max-w-lg rounded mb-4">
                <header class="uppercase font-bold text-2xl text-center pb-4">
                    Update your item
                </header>
                <form method="POST" action="/admin/{{$posting->id}}" enctype="multipart/form-data">
                    @csrf {{--cdsc--}}
                    @method('PUT')
                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Item Name</label>
                        <input type="text" name="title" class="border border-gray-200 rounded p-2 w-full" value="{{$posting->title}}" />
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="brand" class="inline-block text-lg mb-2">Brand</label>
                        <input type="text" name="brand" class="border border-gray-200 rounded p-2 w-full" value="{{$posting->brand}}" />
                        @error('brand')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="price" class="inline-block text-lg mb-2">Price</label>
                        <input type="text" name="price" class="border border-gray-200 rounded p-2 w-full" value="{{$posting->price}}" />
                        @error('price')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="color" class="inline-block text-lg mb-2">Color</label>
                        <input type="text" name="color" class="border border-gray-200 rounded p-2 w-full" value="{{$posting->color}}" />
                        @error('color')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="type" class="inline-block text-lg mb-2">Type (Comma separated)</label>
                        <input type="text" name="type" class="border border-gray-200 rounded p-2 w-full" placeholder="Eg: like new, aunthentic, cod" value="{{$posting->type}}" />
                        @error('type')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="picture" class="inline-block text-lg mb-2">Item Picture</label>
                        <input type="file" name="picture" class="border border-gray-200 rounded p-2 w-full" />
                        @error('picture')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">Description</label>
                        <textarea type="text" name="description" class="border border-gray-200 rounded p-2 w-full">{{$posting->description}}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Location</label>
                        <input type="text" name="location" class="border border-gray-200 rounded p-2 w-full" value="{{$posting->location}}" />
                        @error('location')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6 text-center">
                        <button class="bg-black text-white rounded py-2 px-4 hover:bg-yellow-400 hover:text-black">Confrim Update
                        </button>
                        <a href="/adminHomePage" class="text-black ml-4 rounded py-2 px-4 hover:bg-gray-500 hover:text-white">Back</a>
                    </div>
                </form>
            </x-card>
        </div>

    </div>
</x-admin-layout>