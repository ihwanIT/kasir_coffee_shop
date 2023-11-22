@extends('layout.mainKasir')
@section('dashboard')
@php
$textColor = 'red'; // Mengatur warna teks menjadi putih
@endphp
    <h3>Dashboard</h3>
    <div class="container-card">
        <div class="card-date" style=" border-left:30px solid blue; cursor: pointer;" data-bs-target="#penjualanharian" data-bs-toggle="modal">
            <p>
                {{-- {{ $dataOrder->data }} --}}
                Penjualan harian
                <br>
                120
            </p>
            <img src="assets/icon/paling-banyak-dibeli.png" alt="" width="40px" height="40px">

        </div>
        <div class="card-date" style=" border-left:30px solid yellow; cursor:pointer;" data-bs-target="#banyakdibeli" data-bs-toggle="modal">
            <p>Paling banyak Dibeli harian
                <br>
                Es Teh
            </p>
            <img src="assets/icon/paling-banyak-dibeli2.png" alt="" width="40px" height="40px">

        </div>
        <div class="card-date" style=" border-left:30px solid green; cursor: pointer;" data-bs-target="#pendapatanharian" data-bs-toggle="modal">
            <p>Pendapatan harian
                <br>
                500.000
            </p>
            <img src="assets/icon/pendapatan.png" alt="" width="40px" height="40px">

        </div>
    </div>
    {{-- search --}}
    <div class="search">
        <div>
            <button style="background-color: green; " data-bs-target="#orderDiantar" data-bs-toggle="modal">Orderan Diantar</button >
            <button style="background-color: red;" data-bs-target="#orderHapus" data-bs-toggle="modal">Hapus Orderan</button>
        </div>
        <form action="" method="post">
            <input type="search" name="" id="" placeholder="Cari Pesanan">
            <button type="submit">Cari</button>
        </form>
    </div>
    {{-- end --}}
    {{-- modal paling banyak dibeli --}}
    <div class="modal fade" id="banyakdibeli" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: yellow; color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Paling Banyak Dibeli
                    <span> : Es Teh</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- end --}}
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn" type="submit" style="background-color: yellow; color:white;">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}
    {{-- modal penjualan --}}
    <div class="modal fade" id="penjualanharian" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: blue; color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Penjualan Harian
                    <span> : 120</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- end --}}
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn" type="submit" style="background-color: blue; color:white;">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}
    {{-- modal pendapatan --}}
    <div class="modal fade" id="pendapatanharian" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green; color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pendapatan Harian
                    <span> : 500.000</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Pendapatan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- end --}}
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn" type="submit" style="background-color: green; color:white;">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}
        {{-- modal orderan diantar --}}
        <div class="modal fade" id="orderDiantar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Orderan Diantar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
                {{-- data orderan yang dihapus --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Pesanan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">No Meja</th>
                                <th scope="col">total</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                                <td>text</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>alin</td>
                                <td>data</td>
                                <td>placeholder</td>
                                <td>text</td>
                                <td>text</td>
                                <td>text</td>
                                <td>text</td>
                                <td>text</td>
                                <td>text</td>
                                <td>text</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
                {{-- end --}}
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn" type="submit" style="background-color: green; color:white;">Ok</button>
                </div>
                </form>
            </div>
        </div>
    </div>
        {{-- end --}}

    {{-- modal hapus orderan --}}
    <div class="modal fade" id="orderHapus" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin Hapus Orderan ini ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
            {{-- data orderan yang dihapus --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">total</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                            <td>text</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>alin</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                            <td>text</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- end --}}
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jumlah Orderan Yang Dihapus</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn" type="submit" style="background-color: red; color:white;">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
    {{-- end --}}

    {{-- table data orderan yang belum diantar --}}
    
    <div class="table-responsive table-dashboard">
        <h5 style="text-align: center;">Order yang belum diantar</h5>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Pesanan</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">total</th>
                    <th scope="col">Waktu</th>
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
                    <td>text</td>
                </tr>
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
                    <td>text</td>
                </tr>
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
                    <td>text</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- table data stok kopi kurang dari 5 cup --}}
    
    <div class="table-responsive table-dashboard">
        <h5 style="text-align: center;">Stok kopi kurang dari 10 cup</h5>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Pesanan</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">total</th>
                    <th scope="col">Waktu</th>
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
                    <td>text</td>
                </tr>
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
                    <td>text</td>
                </tr>
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
                    <td>text</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
