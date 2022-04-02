<div>
    <div class="grid gap-4 grid-cols-3 mt-4">
        <div class="form-control">
            <div class="input-group">
              <input type="text" placeholder="Search…" class="input input-bordered" wire:model="search">
              
            </div>
        </div>
        <div class="form-control">
            <div class="input-group">
              <input type="text" placeholder="Harga min...." class="input input-bordered" wire:model="min">
              
            </div>
        </div>
        <div class="form-control">
            <div class="input-group">
              <input type="text" placeholder="Harga max ...." class="input input-bordered" wire:model="max">
              
            </div>
        </div>
    </div>


    <div class="grid gap-4 grid-cols-3">
        @foreach ($products as $produk)
            <div class="card lg:card-side bg-base-100 shadow-xl mb-8 mt-4 ">
                <figure><img src="storage/{{ $produk->gambar }}" alt="Album" class="w-40"></figure>
                <div class="card-body">
                    <h2 class="card-title" >{{ $produk->nama }}</h2>
                    <p >Harga: Rp.{{ number_format($produk->harga) }}</p>
                    <p >Berat: {{ $produk->berat }} Gram</p>
                    <p >Stok: {{ $produk->stok }}</p>
                    <div class="card-actions justify-end">
                        @if (Auth::user()->level ==2)
                        <button class="btn btn-danger" wire:click='hapus({{ $produk->id }})'>Hapus</button>
                        @endif
                        <button class="btn btn-primary" wire:click='beli({{ $produk->id }})'>Beli</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
