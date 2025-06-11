<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TmdbService;

class Movies extends Component
{
    public array $nowPlaying = [];
    public array $popular = [];
    public array $topRated = [];
    public array $upcoming = [];
    public $selectedMovie = null;

    public function mount(TmdbService $tmdb)
    {
        $this->nowPlaying = $tmdb->get('/movie/now_playing', ['language' => 'en-US'])['results'] ?? [];
        $this->popular = $tmdb->get('/movie/popular', ['language' => 'en-US'])['results'] ?? [];
        $this->topRated = $tmdb->get('/movie/top_rated', ['language' => 'en-US'])['results'] ?? [];
        $this->upcoming = $tmdb->get('/movie/upcoming', ['language' => 'en-US'])['results'] ?? [];
    }

    public function showModal($movie)
    {
        $this->selectedMovie = $movie;
    }

    public function render()
    {
        return view('livewire.movies')->layout('components.app-layout');
    }
}
