<?php

use Illuminate\Support\Facades\Route;



Route::get('/login', \App\Livewire\Auth\LoginForm::class)->name('login');

Route::get('/signup', \App\Livewire\Auth\RegisterForm::class)->name('register');
Route::get('/profiles', \App\Livewire\Profiles::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // 🏠 Home/Browse
    Route::get('/', \App\Livewire\Browse::class)->name('home');

    // 📺 TV Shows Page
    Route::get('/tv', \App\Livewire\TvShows::class)->name('tv');

    // 🔍 Search Page
    Route::get('/search', \App\Livewire\Search::class)->name('search');

//     📄 My List (if building next)
    Route::get('/my-list', \App\Livewire\MyList::class)->name('my-list');
    Route::get('/movies', \App\Livewire\Movies::class)->name('movies');
    Route::get('/watch/{type}/{id}', \App\Livewire\Playback::class)->name('watch');
});


//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
//Route::view('profile', 'profile')
//    ->middleware(['auth'])
//    ->name('profile');
//
//require __DIR__.'/auth.php';
