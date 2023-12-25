@extends('layout.mainKasir')
@section('karyawan')
@section('title', 'Transaksi Pemesanan')
@php
    $daftarOrder = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
{{-- search --}}
<div class="search">
    <div>
        <a href="{{ route('kasir.Order') }}">
            <button data-bs-target="#exampleModal" data-bs-toggle="modal"
                style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Orderan baru <i
                    class="fa-solid fa-file-circle-plus"></i></button>
        </a>
    </div>
    <input type="text" id="searchInput" placeholder="Cari Orderan">
</div>
{{-- end --}}
{{-- konfirmasi  --}}
@if (session('success'))
    <div class="alert alert-success" style="margin: 10px; border:0; ">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
    </div>
@endif
{{-- end --}}

<div class="container-tale-transaksi" style="background-color: white; border-radius:20px; padding:10px;">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                {{-- <th scope="col">Kode pesanan</th> --}}
                <th scope="col">Pesanan</th>
                <th scope="col">Jumlah Pesanan</th>
                <th scope="col">Total Bayar</th>
                {{-- <th scope="col">Keterangan</th> --}}
                <th scope="col">Tanggal Order</th>
                <th scope="col"><i class="fa-solid fa-gears"></i></th>
                <th scope="col">Metode Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarOrders as $data)
                <tr>
                    {{-- <td>{{ $data->id }}</td> --}}
                    <td>{{ $data->menu }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>@currency($data->total_harga)</td>
                    {{-- <td>{{ $data->keterangan }}</td> --}}
                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                    <td style="font-size: 11px; cursor:pointer;">

                        <button type="button" class="daftarOrder" data-bs-target="#Modalcencel" data-bs-toggle="modal"
                            data-myid="{{ $data->id }}" data-mytotal="{{ $data->total_harga }}"
                            data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(233, 37, 37); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-ban"></i> Cencel</button>


                        <a href="{{ route('kasir.cetakOrderan', ['id' => $data->id]) }}" target="_blengk"
                            style="background:none;"> <button
                                style="background-color: rgb(93, 93, 187); padding:5px; border-radius:15px; color:white; border:0; "><i
                                    class="fa-solid fa-print"></i> Cetak</button></a>

                    </td>
                    <td style="font-size: 11px; cursor:pointer;">
                        {{-- buttom bayar cash --}}
                        <button type="button" class="daftarOrder" data-bs-target="#ModalBayar" data-bs-toggle="modal"
                            data-myid="{{ $data->id }}" data-myjumlah="{{ $data->jumlah }}"
                            data-mytotal="{{ $data->total_harga }}" data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(63, 210, 63); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-money-bill-wave"></i> Cash</button>
                        {{-- end --}}
                        {{-- buttom bayar e wallet --}}
                        <button type="button" class="daftarOrder" data-bs-target="#ModalBayarEwallet"
                            data-bs-toggle="modal" data-myid="{{ $data->id }}" data-myjumlah="{{ $data->jumlah }}"
                            data-mytotal="{{ $data->total_harga }}" data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(0, 115, 255); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-money-bill-wave"></i> E Wallet</button>
                        {{-- end --}}
                        {{-- buttom bayar e wallet toko --}}
                        <button type="button" class="daftarOrder" data-bs-target="#QrisToko"
                            data-bs-toggle="modal" data-myid="{{ $data->id }}" data-myjumlah="{{ $data->jumlah }}"
                            data-mytotal="{{ $data->total_harga }}" data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(169, 77, 255); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-money-bill-wave"></i> E Wallet Toko</button>
                        {{-- end --}}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- modal bayar orderan Cash --}}
<div class="modal fade" id="ModalBayar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(104, 226, 104);">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar Orderan Cash</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('kasir.transaksiUpdate') }}" method="post">
                    @csrf

                    {{-- input hidden id pesanan --}}
                    <input type="hidden" name="id" id="id">

                    <div class="mb-3">
                        <label for="nama_DaftarOrder" class="col-form-label">Pesanan :</label>
                        <input style="border: 0; font-size:20px;" type="text" class="form-control" name="nama_DaftarOrder" id="nama_DaftarOrder"
                            readonly>
                    </div>
                    {{-- input hidden jumlah pesanan --}}
                    <input type="hidden" name="jumlah" id="jumlah">
                    {{-- input hidden metode pesanan --}}
                    <input type="hidden" name="metode" id="metode" value="Cash">
                    <div class="mb-3">
                        <label for="total_DaftarOrder" class="col-form-label">Total Harga : </label>
                        <input style="border: 0; font-size:20px;" type="text" class="form-control" name="total_DaftarOrder" id="total_DaftarOrder"
                            min="1" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="uang" class="col-form-label">Uang :</label>
                        <input type="number" class="form-control" name="uang" id="uang" placeholder="Rp.0"
                            required>
                    </div>
                    <div class="mb-2">
                        <label for="kembalian" class="col-form-label">Kembalian :</label>
                        <input type="text" class="form-control" name="kembalian" id="kembalian" readonly
                            style="border: 0; font-size:30px;" placeholder="Rp. 0">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style=" border-radius: 20px;">Close</button>
                <button type="submit" class="btn bayarButtom"
                    style="background-color: rgb(63, 216, 81); border-radius: 20px;">Bayar</button>
            </div>
        </div>
    </div>
    </form>
</div>
{{-- end --}}
{{-- modal bayar qris --}}
<div class="modal fade" id="ModalBayarEwallet" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(0, 115, 255); color:white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar Orderan E Wallet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                {{-- <button  data-bs-target="#QrisToko"
                    data-bs-toggle="modal" style="border: 0; padding:5px 20px; border-radius:5px;   background-color: rgb(164, 164, 254); ">
                    Qris Toko
                </button> --}}
                <form action="{{ route('kasir.transaksiUpdateEwallet') }}" method="post">
                    @csrf
                    {{-- input hidden id pesanan --}}
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama_DaftarOrder" class="col-form-label">Pesanan :</label>
                        <input style="border: 0; font-size:20px;" type="text" class="form-control" name="nama_DaftarOrder" id="nama_DaftarOrder"
                            readonly>
                    </div>
                    {{-- input hidden jumlah pesanan --}}
                    <input type="hidden" name="jumlah" id="jumlah">
                    {{-- input hidden jumlah pesanan --}}
                    <input type="hidden" name="metode" id="metode" value="E wallet">
                    {{-- input hidden id pesanan --}}
                    <input type="hidden" class="form-control" name="uang" id="uang" value="-">
                    <input type="hidden" class="form-control" name="kembalian" id="kembalian" value="-">

                    <div class="mb-3">
                        <label for="total_DaftarOrder" class="col-form-label">Total Harga : </label>
                        <input style="border: 0; font-size:20px;" type="text" class="form-control" name="total_DaftarOrder" id="total_DaftarOrder"
                            min="1" readonly>
                    </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn m-3" type="button" style="background-color: rgb(0, 115, 255)">Lanjut</button>
              </div>

        </div>
    </div>
    </form>
</div>
{{-- end --}}

{{-- modal pembayaran Qris Toko --}}

<div class="modal fade" id="QrisToko" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Menunggu pembayaran</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <form action="{{ route('kasir.transaksiUpdate') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <center>Jangan klik Selesai sampai Costumer mengonfirmasi pembayaranya !</center>

            </div>
            {{-- ======================== --}}
            {{-- id --}}
            <input type="hidden" name="id" id="id">

            {{-- input hidden nama orderan pesanan --}}
            <input type="hidden" name="nama_DaftarOrder" id="nama_DaftarOrder">
            {{-- jumlah --}}
            <input type="hidden" name="jumlah" id="jumlah">
            {{-- input hidden metode pesanan --}}
            <input type="hidden" name="metode" id="metode" value="E wallet Toko">
            {{-- input hidden uang pesanan --}}
            <input type="hidden" class="form-control" name="uang" id="uang" value="-">
            {{-- kembalian --}}
            <input type="hidden" class="form-control" name="kembalian" id="kembalian" value="-">
            {{-- total harga --}}
            <input type="hidden" class="form-control" name="total_DaftarOrder" id="total_DaftarOrder">
            {{-- ======================== --}}
            <div class="modal-footer">
                <button type="submit" class="btn bayarButtom"
                    style="background-color: rgb(83, 201, 111); border-radius: 20px;">Selesai</button>
            </div>
        </form>
        </div>
    </div>
    </form>
</div>
{{-- end --}}

{{-- modal cencel orderan --}}
<div class="modal fade" id="Modalcencel" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255, 93, 93); color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin Cencel Orderan ini ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kasir.cencel') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_DaftarOrder" id="id_DaftarOrder">
                    <div class="mb-3">
                        <label for="nama_DaftarOrder" class="col-form-label">Pesanan</label>
                        <input type="text" class="form-control" name="nama_DaftarOrder" id="nama_DaftarOrder"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="total_DaftarOrder" class="col-form-label">Total Harga</label>
                        <input type="text" class="form-control" name="total_DaftarOrder" id="total_DaftarOrder"
                            min="1" disabled>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn" style="background-color: rgb(255, 87, 87);">Hapus</button>
            </div>
        </div>
    </div>
    </form>
</div>
{{-- end --}}

<script>
    // daftar order
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.daftarOrder');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-myid');
                var nama = this.getAttribute('data-mymenu');
                var jumlah = this.getAttribute('data-myjumlah');
                var total = this.getAttribute('data-mytotal');

                // modal bayar transaksi
                var modalBayar = document.getElementById('ModalBayar');
                modalBayar.querySelector('#id').value = id;
                modalBayar.querySelector('#nama_DaftarOrder').value = nama;
                modalBayar.querySelector('#jumlah').value = jumlah;
                modalBayar.querySelector('#total_DaftarOrder').value = total;
                // modal bayar e wallet
                var modalBayar = document.getElementById('ModalBayarEwallet');
                modalBayar.querySelector('#id').value = id;
                modalBayar.querySelector('#nama_DaftarOrder').value = nama;
                modalBayar.querySelector('#jumlah').value = jumlah;
                modalBayar.querySelector('#total_DaftarOrder').value = total;
                // modal hapus transaksi
                var modalHapus = document.getElementById('Modalcencel');
                modalHapus.querySelector('#id_DaftarOrder').value = id;
                modalHapus.querySelector('#nama_DaftarOrder').value = nama;
                modalHapus.querySelector('#total_DaftarOrder').value = total;
            });
        });
    });
</script>

<script>
    // Function to calculate change
    function calculateChange() {
        // Get the total and entered amount
        var total = parseFloat(document.getElementById('total_DaftarOrder').value);
        var uang = parseFloat(document.getElementById('uang').value);

        // Calculate change
        var kembalian = uang - total;

        // Display change if the entered amount is sufficient
        if (!isNaN(kembalian) && kembalian >= 0) {
            document.getElementById('kembalian').value = 'Rp. ' + kembalian.toLocaleString('id-ID');
        } else {
            document.getElementById('kembalian').value = 'Rp. 0';
        }
    }

    // Listen for changes in the input field
    document.getElementById('uang').addEventListener('input', calculateChange);
</script>


@endsection
