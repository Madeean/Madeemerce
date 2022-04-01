<div>
    <h1 class="text-lg font-semibold text-center">Tambah Ongkir</h1>
    <form wire:submit.prevent="getOngkir">
        <div class="flex justify-center">
            <div class="mb-3 xl:w-2/3">
                <label for="provinsi" class="text-base">Silahkan pilih provinsi anda</label>
              <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="provinsi" wire:model='provinsi_id'>
                    <option value="0">Provinsi</option>
                @forelse($daftarProvinsi as $p)
                    <option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option> 
                @empty
                    <option value="0">Provinsi tidak ada</option>
                @endforelse
              </select>
            </div>
        </div>
        
        <div class="flex justify-center">
            <div class="mb-3 xl:w-2/3">
                <label for="kota" class="text-base">Silahkan pilih Kota anda</label>
              <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="kota" wire:model='kota_id'>
                  <option value="">Kabupaten / Kota</option>
                  @if ($provinsi_id)

                    @forelse ($daftarKota as $k)
                        <option value="{{ $k['city_id'] }}">{{ $k['city_name'] }}</option> 
                    @empty
                        <option value="">pilih kabupaten / kota</option>
                    @endforelse
                  
                  @endif
              </select>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="mb-3 xl:w-2/3">
                <label for="nama_jasa" class="text-base">Silahkan pilih Jasa Pengiriman</label>
              <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="nama_jasa" wire:model='nama_jasa'>
                  <option value="">pilih jasa pengiriman</option>
                  <option value="jne">JNE</option>
                  <option value="pos">Pos Indonesia</option>
                  <option value="tiki">TIKI</option>
              </select>
            </div>
        </div>

        
        <br><br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary items-center justify-center">Lihat Daftar Ongkir</button>
        </div>

    </form>

    @if ($result)
        <div class="grid gap-4 grid-cols-3">
            @forelse ($result as $r)

                <div class="card w-96 bg-base-100 shadow-xl mb-8 mt-4">
                    <div class="card-body">
                    <h2 class="card-title">{{ $nama_jasa }}</h2>
                    <h1>Biaya: {{ $r['biaya'] }}</h1>
                    <h1>Estimasi: {{ $r['etd'] }}</h1>
                    <h1>Description: {{ $r['description'] }}</h1>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary" wire:click="save_ongkir({{ $r['biaya'] }})">Buy Now</button>
                    </div>
                    </div>
                </div>
            @empty
                
            @endforelse

        </div>
    @endif


</div>
