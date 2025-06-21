@extends('layouts.layout')
@section('content')
<div class="relative w-full">
    <!-- Slideshow Container -->
    <div class="overflow-hidden relative">
        <!-- Slides -->
        <div class="mySlides">
            <img src="{{ asset('images/slide1.jpg') }}" alt="Slide 1" class="w-full object-cover h-96">
        </div>
        <div class="mySlides">
            <img src="{{ asset('images/slide2.jpg') }}" alt="Slide 2" class="w-full object-cover h-96">
        </div>
        <div class="mySlides">
            <img src="{{ asset('images/slide3.jpg') }}" alt="Slide 3" class="w-full object-cover h-96">
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
<nav class="text-white py-4 w-full" style="background-image: url('{{ asset('images/secondnav.png') }}'); z-index: -1">
     <ul class="flex justify-center space-x-8 gap-40">
        @forelse($categories as $category)
            <li>
                <a href="portfolio/#category-{{ \Illuminate\Support\Str::slug($category->name) }}" class="hover:underline">{{ $category->name }}</a>
            </li>
        @empty
            <li>Geen categorieën beschikbaar</li>
        @endforelse
    </ul>
</nav>

<!-- Text Introduction -->
<div class="w-3/4 mx-auto mt-8 h-64">
    <img src="{{ asset('images/profielfoto.jpg') }}" alt="profile" class="h-60 w-100 border bg-gray-500 float-left mx-auto mr-8">
    <h1 class="text-4xl font-bold text-white">Welkom op mijn website!</h1>
    <p class="mt-4 text-lg text-gray-300">Hier vind je mijn portfolio en meer informatie over mij.</p>
</div>
@endsection