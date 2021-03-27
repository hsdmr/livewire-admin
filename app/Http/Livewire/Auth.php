<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Component;

class Auth extends Component
{
    public $first_name,$last_name,$email,$password,$remember_me,$terms,$validate;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'terms' => 'required',
        'password' => 'required|min:8',
    ];

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->terms = '';
        $this->password = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function whichPage($whichPage){
        $this->resetInputFields();
        $this->which = $whichPage;
    }

    public function login(){
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if(FacadesAuth::attempt($credentials)){
            if(FacadesAuth::user()->role=='admin'){
                return redirect()->route('admin.home');
            }
        }
        $this->addError('failed', __('auth.Email or password is incorrect'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
