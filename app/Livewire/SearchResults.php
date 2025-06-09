<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchResults extends Component
{
    public $query;
    public $results = [];

    public function mount($query)
    {
        $this->query = $query;
        $this->fetchResults();
    }

    public function fetchResults()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.tmdb.bearer'),
            'Accept' => 'application/json',
        ])->get('https://api.themoviedb.org/3/search/multi', [
            'query' => $this->query,
            'language' => 'en-US',
        ]);

        if ($response->successful()) {
            $this->results = $response->json()['results'] ?? [];
        }
    }

    public function render()
    {
        return view('livewire.search-results')->layout('layouts.app');
    }
}
