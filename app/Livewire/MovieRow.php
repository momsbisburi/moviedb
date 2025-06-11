<?php

namespace App\Livewire;

use Livewire\Component;

class MovieRow extends Component
{
    public $title;
    public $movies = [];

    public function mount($title, $movies)
    {
        $this->title = $title;
        $this->movies = $movies;
    }

    public function render()
    {
        return view('livewire.movie-row');
    }
}
