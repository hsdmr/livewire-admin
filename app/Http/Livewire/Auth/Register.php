<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $first_name,$last_name,$email,$password,$terms;
    public $role = 'admin';

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'terms' => 'required',
        'password' => 'required|min:8',
    ];

    public function register(){
        $this->validate();

        if(User::where('email','=',$this->email)->first()!=null) return $this->addError('failed', __('auth.This email already registered.'));

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        $credentials = [
            'email' => $this->email,
            'password' =>$this->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth.app');
    }
}
