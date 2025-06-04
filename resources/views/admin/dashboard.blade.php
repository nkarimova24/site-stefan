@extends('layouts.layout')
@section('content')
<h1 class="text-white mb-6">Hallo {{ Auth::user()->name }}!</h1>

<!-- Add New Category -->
<div class="mb-8">
    <h2 class="text-2xl font-bold text-white mb-4">Manage Categories</h2>
    <form action="{{ route('categories.store') }}" method="POST" class="bg-gray-800 p-4 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="category_name" class="block text-gray-300 font-medium mb-2">Category Name</label>
            <input type="text" id="category_name" name="name" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-1 focus:ring-lime-200" required>
        </div>
        <button type="submit" class="bg-lime-200 hover:bg-lime-400 text-gray font-bold py-2 px-4 rounded-lg transition duration-300">Add Category</button>
    </form>

    <!-- Display Existing Categories -->
    <div class="mt-6">
        <h3 class="text-xl font-bold text-white mb-4">Existing Categories</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($categories as $category)
            <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
                <span class="text-white">{{ $category->name }}</span>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg transition duration-300">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Add New Portfolio Item -->
<div class="mb-8">
    <h2 class="text-2xl font-bold text-white mb-4">Add New Portfolio Item</h2>
    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-4 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-300 font-medium mb-2">Title</label>
            <input type="text" id="title" name="title" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-1 focus:ring-lime-200" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-300 font-medium mb-2">Description</label>
            <textarea id="description" name="description" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-1 focus:ring-lime-200" required></textarea>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-300 font-medium mb-2">Category</label>
            <select id="category" name="category" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-1 focus:ring-lime-200" required>
                <option value="" disabled selected>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-300 font-medium mb-2">Image</label>
            <input type="file" id="image" name="image" class="w-full p-3 rounded-lg bg-gray-700 text-white" required>
        </div>
        <button type="submit" class="bg-lime-200 hover:bg-lime-400 text-gray font-bold py-2 px-4 rounded-lg transition duration-300">Add Item</button>
    </form>
</div>

@endsection
