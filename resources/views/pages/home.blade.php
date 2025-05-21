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
<div class="w-3/4 mx-auto text-center mt-8 bg-gray-800/90  h-64">
    <h1 class="text-4xl font-bold text-white">Welkom op mijn website!</h1>
    <p class="mt-4 text-lg text-gray-300">Hier vind je mijn portfolio en meer informatie over mij.</p>
</div>
@endsection