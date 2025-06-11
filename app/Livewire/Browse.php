<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TmdbService;

class Browse extends Component
{
    public array $trendingMovies = [];
    public array $topRatedMovies = [];
    public array $nowPlayingMovies = [];
    public $selectedMovie = null;

    public function mount(TmdbService $tmdb)
    {
        // Use the service for all API interactions
        $this->trendingMovies = $tmdb->getTrending('movie')['results'] ?? [];

        $this->topRatedMovies = $tmdb->get('/movie/top_rated', ['language' => 'en-US'])['results'] ?? [];

        $this->nowPlayingMovies = $tmdb->get('/movie/now_playing', ['language' => 'en-US'])['results'] ?? [];
    }

    public function showModal($movie)
    {
        $this->selectedMovie = $movie;
    }

    public function render()
    {
        return view('livewire.browse')->layout('components.app-layout');
    }
}
