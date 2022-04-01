@extends('layouts.master')

@section('content')
    <div>
        @if (Auth::user()->level == 2)
            <a href="{{ route('tambah_produk') }}" class="btn btn-info">Tambah Produk</a>
        @endif
    </div>

    <div>
        @livewire('search-produk')
    </div>

@endsection