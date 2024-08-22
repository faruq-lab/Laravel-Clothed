<x-admin-layout>
    {{-- @include('partials._search') --}}

    <x-card class="my-10 mx-4">
        <div>
                <form action="/adminHomePage" method="GET"  class="items-center">
                    <select name="list" id="list" class="w-5/6 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-yellow-300">
                        <option value="user">List of Users</option>
                        <option value="item">List of Items</option>
                    </select>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-200">
                        Refresh
                    </button>
                </form>
        </div>
    </x-card>
    @unless(isset($postings) && !$postings->isEmpty())
    <x-card class="mb-8 mx-4" id="userCard">
        <header>
            <h1 class="text-2xl text-center font-bold pb-9 uppercase">List of Users</h1>
        </header>
        <div class="m-4 overflow-x-auto">
            <table class="table-auto min-w-full">
                <thead class="border-b border-gray-200 px-4">
                    <tr>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/admins/{{$user->id}}/edit" class="text-blue-500 font-bold px-4 py-2 hover:text-blue-600">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                        </td>
                        <td>
                            <form action="/admins/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 font-bold  px-4 py-2 hover:text-red-600"><i class="fas fa-trash-alt"></i></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
    @else
    <x-card class="mx-4" id="itemCard">
        <header>
            <h1 class="text-2xl text-center font-bold pb-9 uppercase">List of Items</h1>
        </header>
        <div class="m-4">
            <table class="table-auto min-w-full">
                <thead class="border-b border-gray-200 px-4">
                    <tr>
                        <th>Picture</th>
                        <th>Item Name</th>
                        <th>Brand</th>
                        <th>Location</th>
                        <th>Belongs To</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postings as $posting)
                    <tr class="text-center">
                        <td><img class="hidden w-10 mr-6 md:block" src="{{$posting->picture ? asset ('storage/' . $posting->picture) : asset('../images/laravelLogo.png')}}" alt="" /></td>
                        <td>{{$posting->title}}</td>
                        <td>{{$posting->brand}}</td>
                        <td>{{$posting->location}}</td>
                        <td>{{$posting->user->name}}</td>
                        <td class="overflow-x-auto min-w-full">{{$posting->description}}</td>
                        <td>
                            {{-- <a href="/admins/{{ $user->id }}/edit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200"> --}}
                            <a href="/admins/{{$posting->id}}/update" class="text-blue-500 font-bold px-4 py-2 hover:text-blue-600">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                        </td>
                        <td>
                            {{-- <form action="/admins/{{ $user->id }}" method="POST"> --}}
                            <form action="/postings/{{$posting->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 font-bold  px-4 py-2 hover:text-red-600"><i class="fas fa-trash-alt"></i></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
    @endunless
</x-admin-layout>
