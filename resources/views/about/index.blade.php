@extends('layouts.layout')
@section('content')
<div class="w-3/4 mx-auto mt-8 h-screen p-4 flex flex-col flex-row items-start gap-8">
    <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="h-150 w-1/2 border bg-gray-500 mx-auto md:mx-0 mb-4 md:mb-0">
    <div>
        <h1 class="text-3xl font-bold mb-4 text-white">Welcome to myself</h1>
        <p class="text-white leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p class="text-white leading-relaxed mt-4">
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
</div>
@endsection