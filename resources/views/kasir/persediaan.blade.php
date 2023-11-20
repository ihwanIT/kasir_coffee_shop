@extends('layout.mainKasir')
@section('persediaan')
@php
$persediaan = 'red'; // Mengatur warna teks menjadi putih
@endphp
    <h3>Persediaan</h3>
    {{-- buttom search --}}
    <div class="search">
        <div>
          <button data-bs-target="#exampleModal" data-bs-toggle="modal"  style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Persediaan</button>
          {{-- <button style="background-color: yellow;">Edit</button> --}}
          <button style="background-color: red;">Hapus</button>
        </div>
        <form action="" method="post">
          <input type="search" name="" id="" placeholder="Cari Persediaan">
          <button type="submit">Cari</button>
        </form>
      </div>

      {{-- table --}}
      <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Keterangan</th>
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
                
                </tr>
            </tbody>
        </table>
      </div>
@endsection