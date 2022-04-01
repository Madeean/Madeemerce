<?php

namespace App\Http\Livewire;

use App\Models\Poduk;
use App\Models\Belanja;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SearchProduk extends Component
{   
    public $search;
    public $products = [];
    public $max;
    public $min;


    public function render()
    {
        if($this->max){
            $harga_max = $this->max;
        }else{
            $harga_max = 1000000000;
        }
        if($this->min){
            $harga_min = $this->min;
        }else{
            $harga_min = 0;
        }
        if($this->search){
            $this->products = Poduk::where('nama','like','%'.$this->search.'%')->where('harga','>=',$harga_min)->where('harga','<=',$harga_max)->get();
        }else{
            $this->products = Poduk::where('harga','>=',$harga_min)->where('harga','<=',$harga_max)->get();
        }
        return view('livewire.search-produk');
    }

    public function beli($id){
        if(!Auth::user()){
            return abort(404);
        }

        $produk = Poduk::find($id);

        Belanja::create([
            'user_id'=>Auth::user()->id,
            'produk_id'=>$produk->id,
            'total_harga' => $produk->harga,
            'status' => 0
        ]);
        return redirect()->route('belanja');

    }
}
