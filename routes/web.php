<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomePage::class);

Route::get('/movie/{id}', \App\Livewire\MovieDetail::class)->name('movie.detail');
Route::get('/watch/{type}/{id}', \App\Livewire\MediaDetail::class)->name('media.detail');
Route::get('/search/{query}', \App\Livewire\SearchResults::class)->name('search.results');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
