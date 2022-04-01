<?php

namespace App\Http\Livewire;

use App\Models\Poduk;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    public $nama;
    public $gambar;
    public $harga;
    public $berat;
    public $stok;
    public function render()
    {
        if(Auth::user()->level ==2){
            return view('livewire.add-product');
        }else{
            abort(404);
        }
    }

    public function store(){
        $validateData = $this->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required',
            'berat' => 'required',
            'stok' => 'required'
        ]);

        $filename = $this->gambar->store('gambar','public');
        $validateData['gambar'] = $filename;

        Poduk::create([
            'nama' => $validateData['nama'],
            'gambar' => $validateData['gambar'],
            'harga' => $validateData['harga'],
            'berat' => $validateData['berat'],
            'stok' => $validateData['stok']
        ]);

        
        return redirect()->route('home');
    }
}
