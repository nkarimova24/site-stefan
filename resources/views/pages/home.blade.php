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
<nav class="text-white py-2 w-full flex justify-center" style="background-image: url('{{ asset('images/secondnav.png') }}'); z-index: -1">
    <!-- Mobile: dropdown -->
    <div class="block sm:hidden w-full max-w-xs mx-auto">
        <select onchange="if(this.value) window.location.href=this.value" class="w-full bg-black/80 text-white rounded p-2 text-center">
            <option value="" class="">Kies een categorie</option>
            @foreach($categories as $category)
                <option value="portfolio/#category-{{ \Illuminate\Support\Str::slug($category->name) }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <!-- Desktop: gewone lijst -->
    <ul class="hidden sm:flex w-full justify-between divide-x-2 divide-double divide-white">
        @forelse($categories as $category)
            <li class="flex-1 text-center px-2">
                <a href="portfolio/#category-{{ \Illuminate\Support\Str::slug($category->name) }}" class="hover:underline block w-full text-base">
                    {{ $category->name }}
                </a>
            </li>
        @empty
            <li class="flex-1 text-center">Geen categorieën beschikbaar</li>
        @endforelse
    </ul>
</nav>

<!-- Text Introduction -->
<div class="w-3/4 mx-auto mt-8">
    <img src="{{ asset('images/profielfoto.jpg') }}" alt="profile" class=" h-50 w-auto ms:h-60 ms:w-100 bg-gray-500 float-left mx-auto mr-8">
    <h1 class="text-4xl font-bold text-white">Welkom op mijn website!</h1>
    <p class="mt-4 mb-16 text-lg text-gray-300">Hier vind je mijn portfolio en meer informatie over mij.</p>
</div>
@endsection