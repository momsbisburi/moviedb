<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $error = '';
    public $isLoading = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->isLoading = true;

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/profiles');
        }

        $this->error = 'Invalid email or password';
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.auth.login-form')->layout('layouts.app');
    }
}
