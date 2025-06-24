<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('slideshow.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
</head>
<body class="bg-black text-gray-800 flex flex-col min-h-screen font-jetbrains">
    <header class="text-white w-full">
        <nav x-data="{ open: false }" class="w-full flex items-center px-2 sm:px-8 py-2 relative" style="background-image: url('{{ asset('images/nav.png') }}'); background-size: cover; background-position: center;">
            <!-- Logo (ongewijzigd) -->
            <a href="/" class="flex-shrink-0">
                <img src="{{ asset('images/stefanbuslogo.png') }}" alt="stefanbuslogo" class="h-15 w-50">
            </a>
            <!-- Hamburger button (alleen mobiel) -->
            <button @click="open = !open" class="sm:hidden ml-auto focus:outline-none z-20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'inline-flex': open, 'hidden': !open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <!-- Navigatie links -->
            <ul :class="{'flex': open, 'hidden': !open }" class="flex-col sm:flex sm:flex-row items-center gap-2 sm:gap-10 ml-4 absolute sm:static left-0 top-full sm:top-auto bg-black/90 sm:bg-transparent w-full sm:w-auto transition-all duration-300 z-10 sm:z-auto sm:ml-4">
                <li><a href="/" class="inline-block hover:scale-110 transition transform duration-300">Home</a></li>
                <li><a href="/about" class="inline-block hover:scale-110 transition transform duration-300">Wie ben ik</a></li>
                <li><a href="/portfolio" class="inline-block hover:scale-110 transition transform duration-300">Portfolio</a></li>
                <!-- Auth knoppen in hamburger menu op mobiel -->
                <li class="block sm:hidden mt-2">
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}" class="block hover:scale-110 transition transform duration-300 bg-white rounded-full text-black p-2 text-xs">
                            Dashboard ({{ Auth::user()->name }})
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline mt-2">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg text-xs transition transform duration-300 hover:scale-110 w-full">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block hover:scale-110 transition transform duration-300 bg-white rounded-full text-black p-2 text-xs">
                            Login
                        </a>
                    @endif
                </li>
            </ul>
            <!-- Auth knoppen helemaal rechts op desktop -->
            <div class="ml-auto hidden sm:flex flex-row items-center gap-2 sm:gap-4">
                @if (Auth::check())
                    <a href="{{ route('dashboard') }}" class="hover:scale-110 transition transform duration-300 bg-white rounded-full text-black p-2 text-base">
                        Dashboard ({{ Auth::user()->name }})
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg text-base transition transform duration-300 hover:scale-110">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:scale-110 transition transform duration-300 bg-white rounded-full text-black p-2 text-base">
                        Login
                    </a>
                @endif
            </div>
        </nav>
    </header>

    <main class="relative">
        <div class="absolute inset-0 bg-cover bg-top opacity-20" style="background-image: url('{{ asset('images/background.png') }}'); z-index: -1;"></div>
        @yield('content')
    </main>

    <footer class="bg-black/30 text-white text-center p-4 rp-0 lp-0 fixed bottom-0 w-full">
        <p>&copy; {{ date('Y') }} Stefan Bus metal art</p>
    </footer>

    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'});" 
            class="fixed bottom-0 right-6 z-50 bg-black hover:bg-gray-400 text-white p-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>
</body>
</html>