<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Profiles extends Component
{
    public $profiles = [];

    public function mount()
    {
        // Fake profiles – replace with DB or user context
        $this->profiles = [
            ['id' => 1, 'name' => 'John', 'avatar' => 'https://i.pravatar.cc/300?img=1', 'isKids' => false],
            ['id' => 2, 'name' => 'Alice', 'avatar' => 'https://i.pravatar.cc/300?img=2', 'isKids' => true],
            ['id' => 3, 'name' => 'Bob', 'avatar' => 'https://i.pravatar.cc/300?img=3', 'isKids' => false],
        ];
    }

    public function selectProfile($id)
    {
        $profile = collect($this->profiles)->firstWhere('id', $id);
        if ($profile) {
            Session::put('profile', $profile);
            return redirect('/browse');
        }
    }

    public function render()
    {
        return view('livewire.profiles')->layout('components.app-layout');
    }
}
