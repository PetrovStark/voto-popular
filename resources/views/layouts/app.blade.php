<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Voto Popular</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased text-gray-900 text-sm bg-gray-background">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="{{route('idea.index')}}" class="w-40"><img class="object-cover" src="{{asset('img/voto-popular.png')}}" alt="Logo do site Voto Popular"></a>
            <div class="flex items-center mt-4 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a class="" href="#">
                    <img src="https://gravatar.com/avatar/00000?d=mp&f=y" alt="Avatar do usuário" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row px-4" style="max-width: 1000px;">
            <div class="w-70 mx-auto md:mr-5">
                <div class="border-2 md:sticky md:top-8 rounded-xl md:mt-16 bg-white py-3 px-3">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Criar uma votação</h3>
                        @auth
                            <p class="text-xs mt-4">Você pode criar uma votação para qualquer coisa, o limite é a sua imaginação!</p>
                        @else
                            <p class="text-xs mt-4">Cadastre-se ou realize seu login para criar ideias incríveis, e iniciar uma votação!</p>
                        @endauth
                    </div>

                    @auth
                        @livewire('create-idea')
                    @else
                        <div class="flex flex-col md:flex-row">
                            <a href="{{route('login')}}" class="bg-blue text-white font-semibold w-full h-10 rounded-xl border-2 border-blue hover:bg-white hover:text-blue transition duration-150 ease-in flex items-center justify-center my-3 md:mr-3 md:w-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-2 md:text-xs">Fazer Login</span>
                            </a>
                            <a href="{{route('register')}}" class="bg-gradient-to-r from-gray-300 to-gray-200 hover:from-gray-200 hover:to-gray-300 font-semibold w-full h-10 rounded-xl transition duration-150 ease-in flex items-center justify-center my-3 md:w-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <span class="ml-2 md:text-xs">Cadastre-se</span>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="w-full px-4 md:px-0 md:w-175">
                <nav class="items-center justify-between text-xs hidden md:flex">
                    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 pb-3 border-blue">Todas as ideias (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Em andamento (87)</a></li>
                    </ul>
                    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 pb-3 border-blue">Aprovadas (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Recusadas (87)</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>

        @livewireScripts
    </body>
</html>
