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
                <img src="{{ asset('stefanbuslogo.png') }}" alt="stefanbuslogo" class="h-20 w-50 rounded-full">
            </a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:scale-110 transition transform duration-300">Home</a></li>
                <li><a href="/about" class="hover:scale-110 transition transform duration-300">Wie ben ik</a></li>
                <li><a href="/portfolio" class="hover:scale-110 transition transform duration-300">portfolio</a></li>
            </ul>
            <a href="{{ route('login') }}" class="ml-auto hover:scale-110 transition transform duration-300">Login</a>
        </nav>
    </header>

    <main class="container relative">
        <div class="absolute inset-0 bg-cover bg-top opacity-20" style="background-image: url('{{ asset('background.png') }}'); z-index: -1;"></div>
        @yield('content')
    </main>

    <footer class="bg-black text-white text-center p-4 fixed bottom-0 w-full">
        <p>&copy; {{ date('Y') }} Stefan Bus metal art</p>
    </footer>
</body>
</html>