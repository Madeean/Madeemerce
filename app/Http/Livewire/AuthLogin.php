<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthLogin extends Component
{

    public $email;
    public $password;
    public $show_password = false;
    public function render()
    {
        return view('livewire.auth-login');
    }

    public function store(){
        // $credentials = $this->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        $this->validate([ 

            'email' => 'required|email', 

            'password' => 'required', 

        ]);

        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){ 

            return redirect()->route('home');

        }else{ 
            session()->flash('success', 'Email atau Password salah');
            return back();

        } 


        dd('gagal');
    }
}
