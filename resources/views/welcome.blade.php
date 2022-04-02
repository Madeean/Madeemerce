@extends('layouts.master')

@section('content')

    <div class="grid gap-4 grid-cols-3 mt-16">
        @foreach ($products as $produk)
            <div class="card lg:card-side bg-base-100 shadow-xl mb-8 mt-4 ">
                <figure><img src="storage/{{ $produk->gambar }}" alt="Album" class="w-40"></figure>
                <div class="card-body">
                    <h2 class="card-title" >{{ $produk->nama }}</h2>
                    <p >Harga: Rp.{{ number_format($produk->harga) }}</p>
                    <p >Berat: {{ $produk->berat }} Gram</p>
                    <p >Stok: {{ $produk->stok }}</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('login') }}" class="btn btn-primary" '>Beli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection