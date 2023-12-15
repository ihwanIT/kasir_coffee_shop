<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style="padding: 30px 70px;">

    <center style="margin:30px 0px;"><h3>LAPORAN PENJUALAN</h3>
<p>
  <h5>KEDAI KOPI XXX</h5>
  Laporan penjualann dan laba rugi per Tangga : <span>{{ $tanggalSekarang }}</span>
</p>
    </center>
    
    <p>- PENJUALAN</p>
    <table  class="table table-bordered">
      <thead>
          <tr>
              <th>Menu</th>
              <th>Total Penjualan</th>
              <th>Total Pendapatan</th>
              <th>Tanggal Penjualan</th>
          </tr>
      </thead>
      <tbody >
          @foreach($laporanPenjualan as $data)
              <tr>
                  <td>{{ $data['menu'] }}</td>
                  <td>{{ $data['total_jumlah'] }}</td>
                  <td>@currency($data['total_pendapatan'])  </td>
                  <td>{{ $data['tanggal'] }}</td>
              </tr>
          @endforeach
          <tr>
            <td>Total :</td>
            <td>{{ $totalPembelian }}</td>
            <td>@currency($totalHarga)</td>
            <td></td>
          </tr>
      </tbody>
  </table>

      <P>- PENGELUARAN</P>
      <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th scope="col"></th> --}}
                {{-- <th scope="col">No</th> --}}
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Stok</th>
                <th scope="col">Pengukuran</th>
                <th scope="col">Supplier</th>
                <th scope="col">Harga</th>
                <th scope="col">Tgl Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stoks as $item_stok)
                <tr>
                    <td>{{ $item_stok->id }}</td>
                    <td>{{ $item_stok->bahan_baku }}</td>
                    <td>{{ $item_stok->jumlah_stok }}</td>
                    <td>{{ $item_stok->satuan_pengukuran }}</td>
                    <td>{{ $item_stok->supplier }}</td>
                    <td>@currency($item_stok->harga_beli)</td>
                    <td>{{ $item_stok->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
            <tr>
              <td>Total:</td>
              <td></td>
              <td></td>
              <td></td>
              <td> </td>
              <td>@currency($TotalPengeluaran)</td>
              <td></td>
          </tr>

        </tbody>
    </table>

      <P>- STOK SISA</P>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah stok sisa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataStok as $item_menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item_menu->id }}</td>
                    <td>{{ $item_menu->nama }}</td>
                    <td>{{ $item_menu->kategori }}</td>
                    <td>{{ $item_menu->jumlah }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
   
    <p>Pendapatan :</p>
     <div class="card-laporana" style="padding: 0px 50px;">
    <P> Total penjualan = <b>{{ $totalPembelian }}</b></P>
    <P> Total omset = <b>@currency($totalHarga)</b></P>
  </div>
    <p>Pengeluaran : </p>
    <P style="padding: 0px 50px;"> 
    <p>Hasil :</p>
    <b>@currency($totalHarga) &minus; @currency($TotalPengeluaran) <br>
    ------------------------------------- <br>
    = @currency($totalLabaBersih)
  </b>
        
    {{-- fungsi print --}}
    <script>
        window.print();
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>