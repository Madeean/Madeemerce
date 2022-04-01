<?php

use App\Http\Controllers\auth as ControllersAuth;
use App\Http\Controllers\Home;
use App\Http\Livewire\AuthLogin;
use App\Http\Livewire\AuthRegister;
use App\Http\Livewire\Bayar;
use App\Http\Livewire\TambahOngkir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[Home::class,'index'])->name('home');

Route::get('/register',[ControllersAuth::class,'register'])->name('register');
Route::get('/login',[ControllersAuth::class,'login'])->name('login');
Route::get('/logout',[ControllersAuth::class,'logout'])->name('logout');

// CRUD
Route::get('/create',function(){
    return view('pages.TambahProduk');
})->name('tambah_produk')->middleware('auth');

// Route::get('/tambahongkir/{id}',function($id){
//     return view('pages.TambahOngkir',['id'=>$id]);
// })->name('tambah_ongkir')->middleware('auth');

Route::get('/tambahongkir/{id}',TambahOngkir::class)->name('tambah_ongkir')->middleware('auth');

Route::get('belanja',function(){
    return view('pages.Belanja');
})->name('belanja')->middleware('auth');

Route::get('/bayar/{id}',Bayar::class)->name('bayar')->middleware('auth');

