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
<h1 class="text-white text-center text-4xl">Portfolio</h1>
<!-- Portfolio Items Grouped by Category -->
@php
    $grouped = $portfolioItems->groupBy('category');
@endphp

@foreach($grouped as $category => $items)
    <h2 id="category-{{ \Illuminate\Support\Str::slug($category) }}" class="text-2xl text-lime-200 mt-8 mb-4">{{ $category }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($items as $item)
            <div class="p-4 rounded-lg shadow-md relative" style="background-image: url('{{ asset('images/nav.png') }}'); background-size: cover; background-position: center;">
                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-auto object-cover rounded-lg mb-4">
                <h2 class="text-xl font-semibold text-white">{{ $item->title }}</h2>
                <p class="text-gray-300">open description &darr;</p>
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
@endforeach
@endsection