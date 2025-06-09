<?php

namespace App\Livewire;


use Livewire\Component;
use App\Services\TmdbService;

class HomePage extends Component
{
    public $movies = [];
    public $series = [];

    public $trendingMovies = [];
    public $trendingSeries = [];

    public function mount(TmdbService $tmdb)
    {
        $this->movies =  collect($tmdb->getPopular('movie'))->take(24);
        $this->series = collect($tmdb->getPopular('tv'))->take(24);
        $this->trendingMovies = collect($tmdb->getTrending('movie'))->take(12);
        $this->trendingSeries = collect($tmdb->getTrending('tv'))->take(12);

    }

    public function render()
    {
        return view('livewire.home-page')
            ->layout('layouts.app', ['title' => 'Home']);
    }
}
