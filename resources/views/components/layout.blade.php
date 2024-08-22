<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    {{-- font and css --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- for flash-message --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    <title>Clothed.my</title>


</head>
<x-flash-message />

<body class="bg-yellow-400">
    <nav class="p-3 bg-white shadow md:flex md:items-center md:justify-between mb-10">
        <div>
            <span class="text-2xl uppercase font-bold">
                <a href="/" class="text-lg">
                    <img class="h-10 inline" src="../../images/prelovedLogo.png">Clothed</span></a>
            </span>
        </div>
        <ul class="md:flex md:items-center">
            @auth
            <li class="mx-5">
                <a href="/" class="text-lg hover:text-yellow-400"><i class="fa fa-home"></i>HOME</a>
            </li>
            <li class="mx-5">
                <a href="/postings/manage" class="text-lg hover:text-yellow-400"><i class="fa fa-sliders-h"></i>MANAGE
                    ITEMS</a>
            </li>
            <li class="mx-5 relative group">
                <div class="text-lg ">
                    <a href="/users/{{auth()->user()->id }}/edit" class="text-lg hover:text-yellow-400">
                        <i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
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


            @else

            <li class="mx-5">
                <a href="/register" class="text-lg hover:text-yellow-400"><i class="fas fa-user-plus"></i>REGISTER</a>
            </li>
            <li class="mx-5">
                <a href="/login" class="text-lg hover:text-yellow-400"><i class="fas fa-sign-in-alt"></i>LOG IN</a>
            </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>
    <footer>
        <a href="/postings/create"
            class="fixed bottom-10 right-10 bg-black text-white py-2 px-5 rounded hover:bg-white hover:text-black"><i
                class="fas fa-plus-circle"></i>
            SELL</a>
    </footer>

</body>

</html>