<?php

namespace App\Livewire;

use App\Services\TmdbService;
use Livewire\Component;

class Home extends Component
{
    public $movies = [];
    public $series = [];

    public $trendingMovies = [];
    public $trendingSeries = [];

    public function mount(TmdbService $tmdb)
    {
        $this->movies =  collect($tmdb->getPopular('movie'))->take(24);
        $this->series = collect($tmdb->getPopular('tv'))->take(24);
        $this->trendingMovies = collect($tmdb->getTrending('movie'))->take(24);
        $this->trendingSeries = collect($tmdb->getTrending('tv'))->take(24);

    }
    public function render()
    {
        return view('livewire.home')->layout('layouts.layout');
    }
}
