<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;

Route::get('/', function () {
    return view('pages.home');
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
Route::get('/dashboard', [PortfolioController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Protect all PortfolioController resource routes with auth middleware
Route::resource('portfolio', PortfolioController::class)->except(['index'])->middleware('auth');


