<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TmdbService;

class SeriesBrowse extends Component
{
    public $popular = [];
    public $trending = [];
    public $topRated = [];

    public function mount(TmdbService $tmdb)
    {
        $this->popular = $tmdb->getPopularSeries();
        $this->trending = $tmdb->getTrendingSeries();
        $this->topRated = $tmdb->getTopRatedSeries();
    }

    public function render()
    {
        return view('livewire.series-browse')
            ->layout('layouts.layout', ['title' => 'Browse Series']);
    }
}
