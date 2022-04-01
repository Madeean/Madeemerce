<div>
    <div class="hero ">
        <div class="hero-content w-full">
          <div class="card  w-full max-w-sm shadow-2xl bg-base-100">
            <h1 class="text-center font-medium">Add Product</h1>
            <form wire:submit.prevent="store">
              <div class="card-body">
                  <div class="form-control">
                    <label class="label"><span class="label-text">Nama</span></label>
                    <input type="text" name="name" placeholder="Nama" class="input input-bordered @error('name') is-invalid @enderror" wire:model="nama">
                    @error('name')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">Gambar</span></label>
                    <input type="file"  placeholder="Gambar" class="input input-bordered @error('gambar') is-invalid @enderror" wire:model="gambar">
                    @error('email')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">harga</span></label>
                    <input type="number"  placeholder="harga" class="input input-bordered @error('harga') is-invalid @enderror" wire:model="harga">
                    @error('harga')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">Berat</span></label>
                    <input type="number" name="berat" placeholder="berat" class="input input-bordered @error('berat') is-invalid @enderror" wire:model="berat">
                    @error('berat')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-control">
                    <label class="label"><span class="label-text">stok</span></label>
                    <input type="number" name="stok" placeholder="stok" class="input input-bordered @error('stok') is-invalid @enderror" wire:model="stok">
                    @error('stok')
                      <span class="text-red-600">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
</div>
