<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AuthRegister extends Component
{
    public $name;
    public $email;
    public $password;
    public $password2;
    public function render()
    {
        return view('livewire.auth-register');
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|',
        'password2' => 'required|same:password',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->password2 = null;
        session()->flash('success', 'success membuat akun');
        return redirect()->route('login');
    }

}
