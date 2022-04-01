<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as autan;
use Illuminate\Session\Middleware\AuthenticateSession;
class auth extends Controller
{
    public function register(){
        return view('pages.register');
    }

    public function login(){
        return view('pages.login');
    }

    public function logout(){
        autan::logout();
        return redirect()->route('home');
    }
}
