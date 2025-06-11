<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TmdbService;

class SearchBar extends Component
{
    public string $query = '';
    public array $results = [];

    public function updatedQuery()
    {
        if (strlen($this->query) < 2) {
            $this->results = [];
            return;
        }

        $tmdb = app(TmdbService::class);
        $this->results = $tmdb->search($this->query)['results'] ?? [];
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
