<?php

namespace App\Http\Livewire;

use App\Models\Poduk;
use App\Models\Belanja;
use Livewire\Component;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Support\Facades\Auth;

class TambahOngkir extends Component
{
    public $belanja;
    private $apiKey = '3ebdcba1f261e8401016725f691192f7';
    public $provinsi_id, $kota_id, $nama_jasa,$daftarProvinsi,$daftarKota;
    public $result=[];
    public $akun;
    public function mount($id)
    {
        if(!Auth::user()){
            return redirect()->route('login');
        }
        $this->akun = Belanja::find($id);

        if(Auth::user()->id != $this->akun->user_id){
            return redirect()->route('home');
        }
        $this->belanja = Belanja::find($id);
        
    }

    public function getOngkir(){
        if(!$this->provinsi_id || !$this->kota_id || !$this->nama_jasa){
            return redirect()->route('belanja');
        }

        $produk = Poduk::find($this->belanja->produk_id);
        
        

        // biaya ongkir
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $cost = $rajaOngkir->ongkosKirim([
            'origin'=>457,
            'destination'=>$this->kota_id,
            'weight'=>$produk->berat,
            'courier'=>$this->nama_jasa
        ])->get();

        
        // nama jasa
        $this->nama_jasa = $cost[0]['name'];

        
        foreach($cost[0]['costs'] as $row){
            $this->result[] = array(
                'description' => $row['description'],
                'biaya'=>$row['cost'][0]['value'],
                'etd'=>$row['cost'][0]['etd']
            );
        }
        
        

    }


    public function save_ongkir($biaya){
        $this->belanja->total_harga += $biaya;
        $this->belanja->status =1;
        $this->belanja->update();

        return redirect()->route('belanja');
    }



    public function render()
    {
        
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $this->daftarProvinsi = $rajaOngkir->provinsi()->all();

        if($this->provinsi_id){
            $this->daftarKota = $rajaOngkir->kota()->dariProvinsi($this->provinsi_id)->get();
        }

        return view('livewire.tambah-ongkir')->extends('layouts.master')->section('content');
    }

    
}
    
