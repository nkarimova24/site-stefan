<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-gray-800 flex flex-col min-h-screen">
    <header class="text-white">
        <nav class="container mx-auto p-4 flex items-center space-x-4" style="background-image: url('{{ asset('nav.png') }}'); background-size: cover; background-position: center;">
            <a href="/">
                <img src="{{ asset('../stefanbuslogo.png') }}" alt="stefanbuslogo" class="h-20 w-50 rounded-full">
            </a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="/about" class="hover:underline">Wie ben ik</a></li>
                <li><a href="/portfolio" class="hover:underline">portfolio</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto p-6 shadow-md rounded-lg mt-6 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} My Website. All rights reserved.</p>
    </footer>
</body>
</html>