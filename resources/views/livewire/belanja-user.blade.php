<div>
    <div class="overflow-x-auto">
        <table class="table w-full">
          <!-- head -->
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal Pesanan</th>
              <th>Nama Produk</th>
              <th>Status</th>
              <th>Total Harga</th>
              <th>Aksi</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            @php
                $no = 1;
            @endphp
            @foreach ($belanja as $item)
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <?php $produk = \App\Models\Poduk::where('id',$item->produk_id)->first(); ?>
                        <img src="storage/{{ $produk->gambar }}" width="62px">
                        {{ $produk->nama }}
                    </td>
                    <td>
                        @if ( $item->status  == 0)
                            <strong>Pesanan belum ditambahkan ongkir</strong>
                        @endif
                        @if ( $item->status  == 1)
                            <strong>Pesanan sudah ditambahkan ongkir</strong>
                        @endif
                        @if ( $item->status  == 2)
                            <strong>Pesanan telah ditambahkan pembayan nya</strong> 
                        @endif
                    </td>

                    <td>Rp. {{ number_format($item->total_harga) }}</td>

                    <td>
                        @if ( $item->status  == 0)
                            <a href="{{ url('tambahongkir/'.$item->id) }}" class="btn btn-info">Tambahkan Ongkir</a>
                        @endif
                        @if ( $item->status  == 1)
                            <a href="{{ url('bayar/'.$item->id) }}" class="btn btn-secondary">Pilih Pembayaran</a>
                        @endif
                        @if ( $item->status  == 2)
                            <a href="{{ url('bayar/'.$item->id) }}" class="btn btn-success">Lihat Status</a>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-danger" wire:click="destroy({{ $item->id }})">Hapus</button>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
