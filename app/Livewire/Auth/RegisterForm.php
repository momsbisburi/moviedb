<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterForm extends Component
{
    public $email = '';
    public $password = '';
    public $confirmPassword = '';
    public $error = '';
    public $isLoading = false;

    public function register()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirmPassword' => 'same:password',
        ]);

        $this->isLoading = true;

        try {
            $user = User::create([
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            Auth::login($user);
            return redirect('/profiles');

        } catch (\Exception $e) {
            $this->error = 'Failed to create account';
        }

        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.auth.register-form')->layout('layouts.app');
    }
}
