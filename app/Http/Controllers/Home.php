<?php

namespace App\Http\Controllers;

use App\Models\Poduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('pages.index');
        }else{
            return view('welcome');
        }
    }

    
}
