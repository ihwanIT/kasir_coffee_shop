@extends('layout.mainKasir')
@section('title', 'Laporan')
@section('laporan')
@php
$laporan = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
$border1 = '1px solid red'; // Mengatur warna teks menjadi putih
@endphp
<div class="print" style=" margin:10px 0px; background-color:white; padding:10px; border-radius:20px;">
    <a href="{{ route('kasir.CetakLaporan') }}" style="text-decoration: none;"  target="_blank"> 
    <button style="padding:5px 20px; border:0; background-color:green; color:white; border-radius:5px; margin:10px 0px">
        Cetak 
        <i class="fa-solid fa-print"></i>
    </button>
</a>
    <table  class="table table-bordered">
        <thead class="table-dark">
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
        </tbody>
    </table>
</div>
@endsection
