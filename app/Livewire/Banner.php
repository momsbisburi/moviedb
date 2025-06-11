<?php

namespace App\Livewire;

use Livewire\Component;

class Banner extends Component
{
    public $movie;

    public function mount($movie)
    {
        $this->movie = $movie;
    }

    public function render()
    {
        return view('livewire.banner');
    }
}
