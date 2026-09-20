<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/how-it-works', function () {
    return view('how-it-works');
});

Route::get('/browse-machines', function () {
    return view('browse-machines');
});
