<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/portfolio', function () {
    return view('portfolio.index');
});

// GET route for displaying the login form
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// POST route for handling login submissions
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


