<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-600 text-white">
        <nav class="container mx-auto p-4">
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="/about" class="hover:underline">About</a></li>
                <li><a href="/contact" class="hover:underline">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-6">
        <p>&copy; {{ date('Y') }} My Website. All rights reserved.</p>
    </footer>
</body>
</html>