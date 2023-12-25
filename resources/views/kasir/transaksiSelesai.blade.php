@extends('layout.mainKasir')
@section('title', 'Transaksi Selesai')
@section('orders')
@php
$daftarOrder = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp

{{-- table --}}
<div class="container-tale-transaksi" style="background-color: white; border-radius:20px; padding:10px; margin:10px 0px">
  <table class="table table-striped table-bordered">
    <div class="search">
      <div>
        <a href="{{ route('kasir.Order') }}">
        <button  style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Orderan Baru <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></button>
      </a>
      </div>
    </div>
      <thead class="table-dark">
          <tr>
              <th scope="col">Pesanan</th>
              <th scope="col">Jumlah Pesanan</th>
              <th scope="col">Pembayaran</th>
              <th scope="col">Uang</th>
              <th scope="col">Kembalian</th>
              <th scope="col">Total Bayar</th>
              <th scope="col">Tanggal Order</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($transaksiSelesai as $data)
              <tr>
                  <td>{{ $data->menu }}</td>
                  <td>{{ $data->jumlah }}</td>
                  <td>{{ $data->metode }}</td>
                  <td>@currency($data->uang)</td>
                  <td>{{ $data->kembalian }}</td>
                  <td>@currency($data->total_harga)</td>
                  {{-- <td>{{ $data->keterangan }}</td> --}}
                  <td>{{ $data->created_at}}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
{{-- end --}}



@endsection