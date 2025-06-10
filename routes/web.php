<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');


Route::get('/watch/{type}/{id}', \App\Livewire\MediaDetail::class)->name('media.detail');
Route::get('/search/{query}', \App\Livewire\SearchResults::class)->name('search.results');
Route::get('/movies', \App\Livewire\MoviePage::class)->name('movies');
Route::get('/series', \App\Livewire\SeriesBrowse::class)->name('series.browse');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
