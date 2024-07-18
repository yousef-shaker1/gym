<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.login');
    }

    public function updated($field){
        $this->validateOnly($field,[
            'email' => 'required|email',
            'password' => 'required|min:4|max:15',
        ]);
    }
}
