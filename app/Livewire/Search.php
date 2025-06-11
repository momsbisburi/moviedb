<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\TmdbService;

class Search extends Component
{
    public string $query = '';
    public array $results = [];
    public $selectedMovie = null;

    public function mount(Request $request)
    {
        $this->query = $request->query('query', '');

        if (strlen($this->query) >= 2) {
            $tmdb = app(TmdbService::class);
            $this->results = $tmdb->search($this->query)['results'] ?? [];
        }
    }

    public function showModal($movie)
    {
        $this->selectedMovie = $movie;
    }

    public function render()
    {
        return view('livewire.search')->layout('components.app-layout');
    }
}
