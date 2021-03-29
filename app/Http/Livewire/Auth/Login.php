<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email,$password,$remember_me;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login(){
        $this->validate();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if(Auth::attempt($credentials)){
            if(Auth::user()->role=='admin'){
                return redirect()->route('admin.dashboard');
            }
        }
        $this->addError('failed', __('auth.Email or password is incorrect'));
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth.app');
    }
}
