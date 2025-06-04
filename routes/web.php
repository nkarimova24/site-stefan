<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

Route::get('/', function () {
    $categories = Category::all();
    return view('pages.home', compact('categories'));
});
Route::get('/about', function () {
    return view('about.index');
});

// Public portfolio page
Route::get('/portfolio', [PortfolioController::class, 'publicIndex'])->name('portfolio.index');

// POST route for storing portfolio data
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');

// GET route for displaying the login form
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

// POST route for handling login submissions
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

// Admin dashboard (protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $categories = \App\Models\Category::all();
        return view('admin.dashboard', compact('categories'));
    })->name('dashboard');

    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Protect all PortfolioController resource routes with auth middleware
Route::resource('portfolio', PortfolioController::class)->except(['index'])->middleware('auth');
Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');


