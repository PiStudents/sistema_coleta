<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Coleta</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-green-300 selection:text-black">
        @if (Route::has('login'))
        <div class="sm:fixed text-2xl sm:top-0 sm:right-0 p-6 text-right">
            @auth
            <a href="{{ url('/dashboard') }}" class="p-3 bg-blue rounded-2xl  font-semibold text-black hover:text-gray-600 ">Dashboard</a>
            @else
            <button class="inline-flex text-white bg-indigo-600 border-0 py-3 px-12 focus:outline-none hover:bg-indigo-400 rounded-2xl text-lg"><a href="{{ route('login') }}">Login</a></button>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-black text-black hover:text-gray-600">Cadastrar</a>
            @endif
            @endauth
        </div>
        @endif

        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-1 py-12 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-screen lg:pr-1 md:pr-1 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="sm:text-7xl text-5xl mb-8 font-black text-black">Descarte corretamente seu lixo eletrônico!
                    </h1>

                    <h1 class="sm:text-4xl text-2xl mt-8 mb-16 font-black text-black">Contribua para um planeta mais limpo.
                    </h1>

                    <div class="flex justify-center">
                        <button class="inline-flex text-white bg-indigo-600 border-0 py-6 px-12 focus:outline-none hover:bg-indigo-400 rounded-2xl text-lg">
                            <a href="{{ '/mapas' }}">Encontre nossos parceiros!</a>
                        </button>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero" src="{{ asset('img/2.png') }}">
                </div>
            </div>
        </section>

    </div>

</body>

</html>