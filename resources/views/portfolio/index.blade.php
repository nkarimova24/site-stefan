@extends('layouts.layout')
@section('content')

<nav class="text-white bg-black py-4 w-full">
    <ul class="flex justify-center space-x-8 gap-40">
        @forelse($categories as $category)
            <li>
                <a href="#category-{{ \Illuminate\Support\Str::slug($category->name) }}" class="hover:underline">{{ $category->name }}</a>
            </li>
        @empty
            <li>Geen categorieën beschikbaar</li>
        @endforelse
    </ul>
</nav>
<h1 class="text-white text-center text-6xl mb-20 mt-20">Portfolio</h1>
<!-- Portfolio Items Grouped by Category -->
@php
    $grouped = $portfolioItems->groupBy('category');
@endphp

@foreach($grouped as $category => $items)
<div style="background-image: url('{{ asset('images/nav.png') }}'); background-size: cover; background-position: center;" class="p-4">
    <h2 id="category-{{ \Illuminate\Support\Str::slug($category) }}" class="text-5xl text-white mt-8 mb-4 text-center">{{ $category }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        @foreach ($items as $item)
            <div class="p-4 rounded-lg shadow-md relative" x-data="{ open: false }">
                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-auto object-cover rounded-lg mb-4">
                <h2 class="text-xl font-semibold text-white">{{ $item->title }}</h2>
                <button @click="open = !open" class="text-gray-300 underline focus:outline-none">open description &darr;</button>
                <div x-show="open" class="mt-2 text-white bg-black/70 p-2 rounded transition-all duration-300">
                    {{ $item->description }}
                </div>
                @auth
                    <form action="{{ route('portfolio.destroy', $item) }}" method="POST" class="absolute top-2 right-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Verwijder</button>
                    </form>
                @endauth
            </div>
        @endforeach
    </div>
</div>
@endforeach
@endsection