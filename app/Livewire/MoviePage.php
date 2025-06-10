<?php

namespace App\Livewire;

use App\Services\TmdbService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MoviePage extends Component
{
    public $popular = [];
    public $trending = [];
    public $topRated = [];

    public function mount(TmdbService $tmdb)
    {
        $this->popular = $tmdb->getPopular();
        $this->trending = $tmdb->getTrending();
        $this->topRated = $tmdb->getTopRated();
    }



    public function render()
    {
        return view('livewire.movie-page')->layout('layouts.layout',  ['title' => 'Browse Movies']);
    }
}
