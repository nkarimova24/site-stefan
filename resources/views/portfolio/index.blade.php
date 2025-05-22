@extends('layouts.layout')
@section('content')
<h1 class="text-white text-center text-4xl">Portfolio</h1>

<!-- Portfolio Items -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($portfolioItems as $item)
        <div class="bg-gray-800 p-4 rounded-lg shadow-md">
            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-white">{{ $item->title }}</h2>
            <p class="text-gray-300">{{ $item->description }}</p>
            <p class="text-gray-400 text-sm mt-2">Category: {{ $item->category }}</p>
        </div>
    @endforeach
</div>
@endsection