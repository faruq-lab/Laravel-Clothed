<x-layout>
<x-card class="py-2">

    <header>
            <h1 class="text-2xl text-center font-bold my-6 uppercase">My Posted Item</h1>
    </header>
    <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($postings->isEmpty())
                @foreach($postings as $posting)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <img class="hidden w-20 mr-6 md:block" src="{{$posting->picture ? asset ('storage/' . $posting->picture) : asset('../images/laravelLogo.png')}}" alt="" />
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/postings/{{$posting->id}}">{{$posting->title}}</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/postings/{{$posting->id}}/edit" class="text-blue-400 px-6 py-2 rounded xl">
                            <i class="fas fa-edit"></i></i>Edit
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/postings/{{$posting->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fas fa-trash-alt"></i></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Item Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>


</x-card>
</x-layout>