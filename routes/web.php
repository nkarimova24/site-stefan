<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/portfolio', function () {
    return view('portfolio.index');
});


