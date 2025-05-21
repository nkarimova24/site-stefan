@extends('layouts.layout')

@section('content')
<div class="w-full max-w-md mx-auto mt-10 bg-gray-800 p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-white text-center mb-6">Login</h1>
    <form action="{{ route('login') }}  " method="POST">
        @csrf
        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-gray-300 font-medium mb-2">Email Adres</label>
            <input type="email" id="email" name="email" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Vul je email in" required>
        </div>

        <!-- Password Field -->
        <div class="mb-4">
            <label for="password" class="block text-gray-300 font-medium mb-2">Wachtwoord</label>
            <input type="password" id="password" name="password" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Vul je wachtwoord in" required>
        </div>

        @if ($errors->any())
            <div class="text-red-500 text-sm mt-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-lg transition duration-300">Login</button>
        </div>
    </form>
</div>
@endsection