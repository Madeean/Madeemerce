<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poduk extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama',
        'gambar',
        'harga',
        'berat',
        'stok'
    ];
}
