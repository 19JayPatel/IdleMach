<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/contact', function () {
    return view('public.contact');
})->name('contact');

Route::get('/how-it-works', function () {
    return view('public.how-it-works');
})->name('how-it-works');

Route::get('/machines', function () {
    return view('public.machines');
})->name('machines');

Route::get('/machine-details', function () {
    return view('public.machine-details');
})->name('machine-details');

Route::get('/login', function () {
    return view('public.login');
})->name('login');

Route::get('/register', function () {
    return view('public.register');
})->name('register');

Route::get('/owner/dashboard', function () {
    return view('owner.dashboard');
})->name('owner.dashboard');

Route::get('/buyer/dashboard', function () {
    return view('buyer.dashboard');
})->name('buyer.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
