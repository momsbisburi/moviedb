<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';

    public function search()
    {
        if (trim($this->query) !== '') {
            return redirect()->route('search.results', ['query' => $this->query]);
        }
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
