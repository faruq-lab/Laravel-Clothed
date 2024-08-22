<x-layout>
    <x-card class="mx-auto max-w-lg rounded mb-4">

        <header class="uppercase font-bold text-2xl text-center pb-4">
            sell your item now !
        </header>

        <form method="POST" action="/postings" enctype="multipart/form-data">
            @csrf {{--cdsc--}}
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Item Name</label>
                <input type="text" name="title" class="border border-gray-200 rounded p-2 w-full" value="{{old('title')}}" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="brand" class="inline-block text-lg mb-2">Brand</label>
                <input type="text" name="brand" class="border border-gray-200 rounded p-2 w-full" value="{{old('brand')}}" />
                @error('brand')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="text" name="price" class="border border-gray-200 rounded p-2 w-full" value="{{old('price')}}" />
                @error('price')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="color" class="inline-block text-lg mb-2">Color</label>
                <input type="text" name="color" class="border border-gray-200 rounded p-2 w-full" value="{{old('color')}}" />
                @error('color')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="type" class="inline-block text-lg mb-2">Type (Comma separated)</label>
                <input type="text" name="type" class="border border-gray-200 rounded p-2 w-full" placeholder="Eg: like new, aunthentic, cod" value="{{old('type')}}" />
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
                <textarea type="text" name="description" class="border border-gray-200 rounded p-2 w-full">{{old('description')}}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" name="location" class="border border-gray-200 rounded p-2 w-full" value="{{old('location')}}" />
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 text-center">
                <button class="bg-black text-white rounded py-2 px-4 hover:bg-yellow-400 hover:text-black">Sell Item
                </button>
                <a href="/" class="text-black ml-4 rounded py-2 px-4 hover:bg-gray-500 hover:text-white">Back</a>
            </div>
        </form>
    </x-card>

</x-layout>
