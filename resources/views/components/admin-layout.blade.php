<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    {{-- font and css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- for flash-message --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    <title>Admin Clothed.my</title>


</head>
<x-flash-message />

<body class="bg-yellow-400">
    <nav class="p-3 bg-white shadow md:flex md:items-center md:justify-between mb-10">
        <div>
            <span class="text-2xl uppercase font-bold">
                <a href="/adminHomePage" class="text-lg">
                    <img class="h-10 inline" src="../../images/prelovedLogo.png">admin Clothed</span></a>
            </span>
        </div>
        <ul class="md:flex md:items-center">
            <li class="mx-5 relative group">
                <div class="text-lg ">
                    <i class="fa fa-user"></i> {{ auth()->user()->name }}
                </div>
            </li>
            <li>
                <form class="inline" method="post" action="/logout">
                    @csrf
                    <button type="submit" class="hover:text-red-400">
                        <i class="fas fa-sign-out-alt"></i></i>
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>
    {{-- <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start h-24 mt-24 md:justify-center">
        <a href="/postings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5 rounded hover:bg-white hover:text-black"><i class="fas fa-plus-circle"></i>
            SELL</a>
    </footer> --}}
</body>

</html>
