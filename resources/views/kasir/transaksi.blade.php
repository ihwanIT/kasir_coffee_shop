@extends('layout.mainKasir')
@section('karyawan')
    <h3>Transaksi</h3>
    {{-- search --}}
    <div class="search">
        <div>
            <button data-bs-target="#exampleModal" data-bs-toggle="modal"
                style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Transaksi</button>
            <button style="background-color: red;">Hapus</button>

        </div>
        <form action="" method="post">
            <input type="search" name="" id="" placeholder="Cari Transaksi">
            <button type="submit">Cari</button>
        </form>
    </div>
    {{-- end --}}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">No</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tempat Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Bagian pekerjaan</th>
                <th scope="col">Tahun masuk</th>
                <th scope="col">Izin</th>
                <th scope="col">Sakit</th>
                <th scope="col">Tanpa Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>1,001</td>
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
@endsection
