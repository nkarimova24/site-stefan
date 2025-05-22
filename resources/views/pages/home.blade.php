@extends('layouts.layout')
@section('content')
<div class="relative w-full">
    <!-- Slideshow Container -->
    <div class="overflow-hidden relative">
        <!-- Slides -->
        <div class="mySlides">
            <img src="{{ asset('slide1.jpg') }}" alt="Slide 1" class="w-full object-cover h-96">
        </div>
        <div class="mySlides">
            <img src="{{ asset('slide2.jpg') }}" alt="Slide 2" class="w-full object-cover h-96">
        </div>
        <div class="mySlides">
            <img src="{{ asset('slide3.jpg') }}" alt="Slide 3" class="w-full object-cover h-96">
        </div>
    </div>

    <!-- Arrows -->
    <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white rounded-full text-5xl">
        &#10094; <!-- Left arrow -->
    </button>
    <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white rounded-full text-5xl">
        &#10095; <!-- Right arrow -->
    </button>
</div>

<!-- Second Navigation Bar -->
<nav class=" text-white py-4" style="background-image: url('{{ asset('secondnav.png') }}'); z-index: -1">
    <ul class="flex justify-center space-x-8 gap-40">
        <li><a href="/category1" class="hover:underline">Categorie 1</a></li>
        <li class="border-l border-gray-500 pl-4"><a href="/category2" class="hover:underline">Categorie 2</a></li>
        <li class="border-l border-gray-500 pl-4"><a href="/category3" class="hover:underline">Categorie 3</a></li>
        <li class="border-l border-gray-500 pl-4"><a href="/category4" class="hover:underline">Categorie 4</a></li>
        <li class="border-l border-gray-500 pl-4"><a href="/category5" class="hover:underline">Categorie 5</a></li>
    </ul>
</nav>

<!-- Text Introduction -->
<div class="w-3/4 mx-auto mt-8 h-64">
    <img src="{{ asset('temporary') }}" alt="profile" class="h-80 w-80 border bg-gray-500 float-left rounded-full mx-auto">
    <h1 class="text-4xl font-bold text-white">Welkom op mijn website!</h1>
    <p class="mt-4 text-lg text-gray-300">Hier vind je mijn portfolio en meer informatie over mij.</p>
</div>
@endsection