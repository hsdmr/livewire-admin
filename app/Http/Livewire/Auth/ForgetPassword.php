<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class ForgetPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];
    public function forgetPassword(){

    }

    public function render()
    {
        return view('livewire.auth.forget-password')->layout('layouts.auth.app');
    }
}
