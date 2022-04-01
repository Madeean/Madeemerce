<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BelanjaUser extends Component
{
    public $belanja = [];
    public function __construct()
    {
        if(Auth::user()){
            $this->belanja = Belanja::where('user_id',Auth::user()->id)->get();
        }else{
            return redirect()->route('login');
        }
    }
    public function destroy($id){
        $pesanan = Belanja::find($id);
        $pesanan->delete();
        return redirect()->route('belanja');
    }

    public function render()
    {

        return view('livewire.belanja-user');
    }
}
