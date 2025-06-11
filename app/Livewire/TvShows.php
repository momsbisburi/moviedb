<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TmdbService;

class TvShows extends Component
{
    public array $trending = [];
    public array $topRated = [];
    public array $airingToday = [];
    public $selectedTv = null;

    public function mount(TmdbService $tmdb)
    {
        $this->trending = $tmdb->getTrending('tv')['results'] ?? [];

        $this->topRated = $tmdb->get('/tv/top_rated', ['language' => 'en-US'])['results'] ?? [];

        $this->airingToday = $tmdb->get('/tv/airing_today', ['language' => 'en-US'])['results'] ?? [];
    }

    public function showModal($tv)
    {
        $this->selectedTv = $tv;
    }

    public function render()
    {
        return view('livewire.tv-shows')->layout('components.app-layout');
    }
}
