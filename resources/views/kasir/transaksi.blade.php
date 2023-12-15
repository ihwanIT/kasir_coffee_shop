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
                <th scope="col">Kode pesanan</th>
                <th scope="col">Pesanan</th>
                <th scope="col">Jumlah Pesanan</th>
                <th scope="col">Total Bayar</th>
                {{-- <th scope="col">Keterangan</th> --}}
                <th scope="col">Tanggal Order</th>
                <th scope="col"><i class="fa-solid fa-gears"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarOrders as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->menu }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>@currency($data->total_harga)</td>
                    {{-- <td>{{ $data->keterangan }}</td> --}}
                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                    <td style="font-size: 10px; cursor:pointer;">

                        <button type="button" class="daftarOrder" data-bs-target="#Modalcencel" data-bs-toggle="modal"
                            data-myid="{{ $data->id }}" data-mytotal="{{ $data->total_harga }}"
                            data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(233, 37, 37); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-ban"></i> Cencel</button>

                        {{-- buttom bayar --}}
                        {{-- <button type="button" class="daftarOrder" data-bs-target="#ModalBayar" data-bs-toggle="modal"
                            data-myid="{{ $data->id }}" data-myjumlah="{{ $data->jumlah }}"
                            data-mytotal="{{ $data->total_harga }}" data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(63, 210, 63); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-money-bill-wave"></i> Bayar</button> --}}
                        {{-- end --}}
                        {{-- buttom bayar --}}
                        <button type="button" class="daftarOrder" data-bs-target="#MetodeBayar" data-bs-toggle="modal"
                            data-myid="{{ $data->id }}" data-myjumlah="{{ $data->jumlah }}"
                            data-mytotal="{{ $data->total_harga }}" data-mymenu="{{ $data->menu }}"
                            style="background-color: rgb(63, 210, 63); padding:5px; border-radius:15px; color:white; border:0;"><i
                                class="fa-solid fa-money-bill-wave"></i> Bayar</button>
                        {{-- end --}}


                        <a href="{{ route('kasir.cetakOrderan', ['id' => $data->id]) }}" target="_blengk"
                            style="background:none;"> <button
                                style="background-color: rgb(97, 97, 255); padding:5px; border-radius:15px; color:white; border:0; "><i
                                    class="fa-solid fa-print"></i> Cetak</button></a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- modal metode pembayaran orderan --}}
<div class="modal fade" id="MetodeBayar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 40px;">
            <div class="modal-header" style="background-color: rgb(87, 203, 87);">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Metode Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-target="#ModalBayar"
                        data-bs-toggle="modal">Cash</button>
                    <button class="btn btn-primary" type="button" data-bs-target="#MetodeBayarEwallet"
                        data-bs-toggle="modal">E wallet</button>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style=" border-radius: 20px;">Close</button>
            </div>
        </div>
    </div>
    </form>
</div>
{{-- end --}}

{{-- modal bayar orderan Cash --}}
<div class="modal fade" id="ModalBayar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 40px;">
            <div class="modal-header" style="background-color: rgb(104, 226, 104); border-radius: 30px;">
                {{-- <button data-bs-target="#MetodeBayar" data-bs-toggle="modal" style="border:0;"><i class="fa-solid fa-reply" ></i></button> --}}
                <i class="fa-solid fa-reply" data-bs-target="#MetodeBayar" data-bs-toggle="modal" style="margin-right: 20px; cursor:pointer;"></i>
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
                        <input type="text" class="form-control" name="nama_DaftarOrder" id="nama_DaftarOrder"
                            readonly>
                    </div>

                    {{-- input hidden jumlah pesanan --}}
                    <input type="hidden" name="jumlah" id="jumlah">
                    {{-- input hidden id pesanan --}}
                    <div class="mb-3">
                        <label for="total_DaftarOrder" class="col-form-label">Total Harga : </label>
                        <input type="text" class="form-control" name="total_DaftarOrder" id="total_DaftarOrder"
                            min="1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="uang" class="col-form-label">Uang :</label>
                        <input type="number" class="form-control" name="uang" id="uang" placeholder="Rp.0"
                            required>
                    </div>
                    <div class="mb-3">
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

{{-- modal metode pembayaran orderan E Wallet --}}
<div class="modal fade" id="MetodeBayarEwallet" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 40px;">
            <div class="modal-header" style="background-color: rgb(240, 255, 109); border-radius: 30px;">
                <i class="fa-solid fa-reply" data-bs-target="#MetodeBayar" data-bs-toggle="modal" style="margin-right: 20px; cursor:pointer;"></i>
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar Orderan dengan E Wallet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-Ewallet"
                    style="background-color: rgb(207, 207, 207); height:400px; border-radius:20px;">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style=" border-radius: 20px;">Close</button>
                <button type="submit" class="btn bayarButtom"
                    style="background-color: rgb(236, 244, 90); border-radius: 20px;">Bayar</button>
            </div>
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
    // edit daftar order
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
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen-elemen yang diperlukan
        var uangInput = document.getElementById('uang');
        var totalDaftarOrderInput = document.getElementById('total_DaftarOrder');
        var kembalianInput = document.getElementById('kembalian');

        uangInput.addEventListener('input', function() {
            var totalHarga = parseFloat(totalDaftarOrderInput.value) || 0;
            var uang = parseFloat(uangInput.value) || 0;

            // mengambil class bayar buttom
            var kembalianBtn = document.querySelector('.bayarButtom');

            var kembalian = uang - totalHarga;
            kembalian = kembalian >= 0 ? formatRupiah(kembalian) : 'Rp. 0';

            kembalianInput.value = kembalian;

            // Nonaktifkan tombol jika uang kurang dari total harga
            if (uang < totalHarga) {
                kembalianBtn.disabled = true;
            } else {
                kembalianBtn.disabled = false;
            }
        });
    });


    // Fungsi untuk format nilai menjadi mata uang Rupiah
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        var formatted = ribuan.join('.').split('').reverse().join('');
        return 'Rp. ' + formatted;
    }
</script>

{{-- searh with JS --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const columns = row.getElementsByTagName('td');
                let shouldHide = true;

                Array.from(columns).forEach(column => {
                    if (column.textContent.toLowerCase().includes(searchValue)) {
                        shouldHide = false;
                    }
                });

                if (shouldHide) {
                    row.style.display = 'none';
                } else {
                    row.style.display = '';
                }
            });
        });
    });
</script>



@endsection
