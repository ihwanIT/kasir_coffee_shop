@extends('layout.mainKasir')
@section('title', 'Laporan')
@section('laporan')
@php
$laporan = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
$border1 = '1px solid red'; // Mengatur warna teks menjadi putih
@endphp
<h4 style="background-color: rgb(78, 78, 255); margin:0px; color:white; padding:10px; border-radius:0px 0px 10px 10px;">Laporan</h4>
<div class="print" style="text-align: end; margin:10px 0px; ">
    <a href="{{ route('kasir.CetakLaporan') }}" style="text-decoration: none;"  target="_blank"> 
    <button style="padding:5px 20px; border:0; background-color:green; color:white; border-radius:5px;">
        Cetak 
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
  
    </button>
</a>
</div>
    <h4>Penjualan</h4>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Jumlah penjualan</th>
            <th scope="col">Harga penjualan satuan</th>
            <th scope="col">Total</th>
            <th scope="col">Tanggal</th>
          </tr>
          </thead>
         <tbody> 
          <tr>
            @foreach ($orders as $item_menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item_menu->nama_orderan }}</td>
                <td>{{ $item_menu->jumlah }}</td>
                <td>@currency($item_menu->harga) </td>
                <td>@currency($item_menu->total)</td>
                <td>{{ $item_menu->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
        <tr>
            <td>Total:</td>
            <td></td>
            <td>{{ $totalPembelian }}</td>
            <td></td>
            <td>@currency($totalHarga) </td>
            <td></td>
        </tr>
          </tr>
          </tbody>
      </table>
    

@endsection
