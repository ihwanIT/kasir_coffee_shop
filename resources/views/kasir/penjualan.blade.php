@extends('layout.mainKasir')
@section('penjualan')
    <h3>Penjualan</h3>
    {{-- search --}}
    <div class="search">
        <div>
            <button data-bs-target="#exampleModal" data-bs-toggle="modal"
                style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Transaksi</button>
            <button style="background-color: red;">Hapus</button>

        </div>
        <form action="" method="post">
            <input type="search" name="" id="" placeholder="Cari Penjualan">
            <button type="submit">Cari</button>
        </form>
    </div>
    {{-- end --}}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">No</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Pesanan</th>
                <th scope="col">Harga</th>
                <th scope="col">Jenis</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Jenis Transaksi</th>
                <th scope="col">Waktu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>1</td>
                <td>alin</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>1</td>
                <td>alin</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>1</td>
                <td>alin</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
                <td>text</td>
            </tr>
        </tbody>
    </table>
    {{-- grafik penjualan --}}
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    {{-- end --}}
@endsection
