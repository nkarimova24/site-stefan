<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('slideshow.js') }}"></script>
</head>
<body class="bg-black text-gray-800 flex flex-col min-h-screen">
    <header class="text-white">
        <nav class="w-full flex items-center" style="background-image: url('{{ asset('nav.png') }}'); background-size: cover; background-position: center;">
            <a href="/">
                <img src="{{ asset('stefanbuslogo.png') }}" alt="stefanbuslogo" class="mr-10 h-20 w-70 rounded-full">
            </a>
            <ul class="flex space-x-4 gap-10">
                <li><a href="/" class="inline-block hover:scale-110 transition transform duration-300">Home</a></li>
                <li><a href="/about" class="inline-block hover:scale-110 transition transform duration-300">Wie ben ik</a></li>
                <li><a href="/portfolio" class="inline-block hover:scale-110 transition transform duration-300">Portfolio</a></li>
            </ul>
            
            @if (Auth::check())
                <!-- If the user is logged in -->
                <a href="{{ route('dashboard') }}" class="ml-auto mr-10 hover:scale-110 transition transform duration-300 bg-white rounded-full text-black p-2">
                    Dashboard ({{ Auth::user()->name }})
                </a>
            @else
                <!-- If the user is not logged in -->
                <a href="{{ route('login') }}" class="ml-auto mr-10 hover:scale-110 transition transform duration-300 bg-white rounded-full text-black p-2">Login</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 float-right mr-10">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main class="relative">
        <div class="absolute inset-0 bg-cover bg-top opacity-20" style="background-image: url('{{ asset('background.png') }}'); z-index: -1;"></div>
        @yield('content')
    </main>

    <footer class="bg-black/30 text-white text-center p-4 fixed bottom-0 w-full">
        <p>&copy; {{ date('Y') }} Stefan Bus metal art</p>
    </footer>
</body>
</html>