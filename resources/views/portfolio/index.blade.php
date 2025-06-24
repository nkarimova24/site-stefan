@extends('layouts.layout')
@section('content')

<nav class="text-white py-2 w-full flex justify-center">
    <!-- Mobile: dropdown -->
    <div class="block sm:hidden w-full max-w-xs mx-auto">
        <select onchange="if(this.value) window.location.href=this.value" class="w-full bg-black/80 text-white rounded p-2 text-center">
            <option value="">Kies een categorie</option>
            @foreach($categories as $category)
                <option value="#category-{{ \Illuminate\Support\Str::slug($category->name) }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <!-- Desktop: gewone lijst -->
    <ul class="hidden sm:flex w-full justify-between divide-x-2 divide-double divide-white">
        @forelse($categories as $category)
            <li class="flex-1 text-center px-2">
                <a href="#category-{{ \Illuminate\Support\Str::slug($category->name) }}" class="hover:underline block w-full text-base">
                    {{ $category->name }}
                </a>
            </li>
        @empty
            <li class="flex-1 text-center">Geen categorieën beschikbaar</li>
        @endforelse
    </ul>
</nav>
<h1 class="text-white text-center text-6xl mb-20 mt-20">Portfolio</h1>
<!-- Portfolio Items Grouped by Category -->
@php
    $grouped = $portfolioItems->groupBy('category');
@endphp
@foreach($grouped as $category => $items)
<div class="p-4">
    <h2 id="category-{{ \Illuminate\Support\Str::slug($category) }}" class="text-5xl text-white mt-8 mb-4 text-center">{{ $category }}</h2>
    <div class="columns-1 sm:columns-2 md:columns-3 gap-4 p-4">
        @foreach ($items as $item)
            <div class="group relative mb-4 break-inside-avoid rounded-lg shadow-md bg-black/70 p-2 ">
                <img src="{{ asset('storage/' . $item->image) }}"
                     alt="{{ $item->title }}"
                     class="w-full h-auto object-cover rounded-lg mb-2 transition duration-300 group-hover:opacity-60">
                <h2 class="text-xl font-semibold text-white">{{ $item->title }}</h2>
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg p-4 overflow-scroll overflow-x-hidden overflow-y-auto custom-scrollbar">
                    <p class="text-gray-100 text-center text-xl">{{ $item->description }}</p>
                </div>
                @auth
                    <form action="{{ route('portfolio.destroy', $item) }}" method="POST" class="absolute top-2 right-2 z-10"
                          onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-2 py-1 rounded text-xs shadow-lg">
                            Verwijder
                        </button>
                    </form>
                @endauth
            </div>
        @endforeach
    </div>
</div>
@endforeach
@endsection