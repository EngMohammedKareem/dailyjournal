<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('journals', 'journals.index')
    ->middleware(['auth'])
    ->name('journals.index');


Route::view('journals/create', 'journals.create')
    ->middleware(['auth'])
    ->name('journals.create');

require __DIR__ . '/auth.php';
