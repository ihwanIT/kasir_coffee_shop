@extends('layout.mainKasir')
@section('title', 'Dashboard')
@section('dashboard')
@php
$textColor = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
<h4 style="background-color: rgb(78, 78, 255); margin:0px; color:white; padding:10px; border-radius:0px 0px 20px 20px;">Dashboard</h4>
    <div class="container-card">
        <div class="card-date" style=" border-left:30px solid rgb(155, 155, 254); cursor: pointer; " data-bs-target="#penjualanharian" data-bs-toggle="modal">
            <p>
                Penjualan harian
                <br>
                @if($total_penjualans > 0)
                <span class="span-card">
                    {{ $total_penjualans }}
                    @else
                    <span>Tidak ada penjualan</span>
                    @endif
                </span>
                
            </p>
            <img src="assets/icon/paling-banyak-dibeli.png" alt="" width="40px" height="40px">

        </div>
        <div class="card-date" style=" border-left:30px solid rgb(255, 255, 132); cursor:pointer;" data-bs-target="#banyakdibeli" data-bs-toggle="modal">
            <p>
                Banyak Dibeli harian
                <br>
                @if(isset($orderWithHighestTotal))
                    <span> {{ $orderWithHighestTotal->nama_orderan }}</span>
                @else
                    <span>Tidak ada Penjualan</span>
                @endif
                </span>
            </p>
            <img src="assets/icon/paling-banyak-dibeli2.png" alt="" width="40px" height="40px">

        </div>
        <div class="card-date" style=" border-left:30px solid rgb(114, 202, 114); cursor: pointer;" data-bs-target="#pendapatanharian" data-bs-toggle="modal">
            <p>
                Pendapatan harian
                <br>
                @if($pendapatan_penjualans > 0)
                <span>
                @currency($pendapatan_penjualans)
                @else
                <span>Tidak ada penjualan</span>
                @endif
                </span>
            </p>
            <img src="assets/icon/pendapatan.png" alt="" width="40px" height="40px">

        </div>
    </div>

    {{-- modal paling banyak dibeli --}}
    <div class="modal fade" id="banyakdibeli" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(253, 253, 125);">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Paling Banyak Dibeli :
                    @if(isset($orderWithHighestTotal))
                    <span> {{ $orderWithHighestTotal->nama_orderan }}</span>
                @else
                    <span>Tidak ada orderan pada hari ini.</span>
                @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                @if($orders->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah penjualan</th>
                            <th scope="col">Total penjualan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_orderan }}</td>
                        <td>@currency($item->harga)</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>@currency($item->total)</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                @else
                <center style="margin: 20px 0px;"><p>Tidak ada data penjualan hari ini.</p></center>
                
            @endif
        
            </div>

            {{-- end --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: rgb(213, 213, 110); border:0; color:black;">Ok</button>
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
            <div class="modal-header" style="background-color: rgb(102, 102, 190); color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Penjualan Harian
                    <span> : {{ $total_penjualans }}</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                @if($orders->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah penjualan</th>
                            <th scope="col">Total penjualan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_orderan }}</td>
                            <td>@currency($item->harga)</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>@currency($item->total)</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                @else
                <center style="margin: 20px 0px;"><p>Tidak ada data penjualan hari ini.</p></center>
                
            @endif
        
            </div>

            {{-- end --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: rgb(137, 137, 227); border:0;">Ok</button>
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
            <div class="modal-header" style="background-color: rgb(92, 156, 92); color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pendapatan Harian
                    <span> : @currency($pendapatan_penjualans)</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                @if($orders->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah penjualan</th>
                            <th scope="col">Total penjualan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_orderan }}</td>
                            <td>@currency($item->harga)</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>@currency($item->total)</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                @else
                <center style="margin: 20px 0px;"><p>Tidak ada data penjualan hari ini.</p></center>
                
            @endif
        
            </div>

            {{-- end --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: rgb(90, 155, 90); border:0;">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}

    {{-- end --}}


    {{-- table data orderan yang belum diantar --}}
    <div class="table-responsive table-dashboard">
        <div class="table-stok-dashboard">

        <h5 style="text-align: center;">Stok kurang dari 10 cup</h5>
        @if($lowStok->count() > 0)
        <table class="table table-striped table-hover-dashboard">
            <thead>
                <tr>
                    {{-- <th scope="col">No</th> --}}
                    <th scope="col">Nama</th>
                    {{-- <th scope="col">Harga</th> --}}
                    <th scope="col">Stok</th>
                    <th scope="col">Tanggal akhir stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowStok as $item)
                <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $item->nama }}</td>
                {{-- <td>@currency($item->harga) </td> --}}
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                @endforeach
            </tr>
            </tbody>
        </table>
        @else
        <center style="margin: 20px 0px;"><p>Stok masih mencukupi.</p></center>
    @endif
    <a href="/MenuProduk">
    <button>Tambah <i class="fa-solid fa-circle-plus"></i></button>
</a>
</div>
    {{-- ========== --}}
       <div class="card" style="padding: 20px;width:60%; border-radius:20px; margin:10px; border:0;">

    {!! $orderCard->container() !!}

<script src="{{ $orderCard->cdn() }}"></script>

{{ $orderCard->script() }}
</div>

    </div>

    <div class="daftar-orderan" style="display: flex;">
        <div class="orderan" style="" >
            <h5 style="text-align: center;">Orderan belum diantar</h5>
            @if($lowStok->count() > 0)
            <table class="table table-striped table-hover">
                
                <thead>
                    <tr>
                        {{-- <th scope="col">No</th> --}}
                        <th scope="col">Nama</th>
                        {{-- <th scope="col">Harga</th> --}}
                        <th scope="col">Stok</th>
                        <th scope="col">Tanggal akhir stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowStok as $item)
                    <tr>
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                    <td>{{ $item->nama }}</td>
                    {{-- <td>@currency($item->harga) </td> --}}
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            @else
            <center style="margin: 20px 0px;"><p>Stok masih mencukupi.</p></center>
        @endif
        </div>
        <div class="data-penjualan-seluruh" style=" width:40%; background-color:white; padding:10px; margin:10px; border-radius:20px; text-align:center; height:100%;">
            <b>Data penjualan sampai dengan Tanggal : {{ $tanggal }}</b>
            <div class="container-data" style="display: flex;">
        <div class="link-orderan" style="background: linear-gradient(to top, #fefefe, #7e64ff);" >
            Penjualan 
            <br>
            <b>{{ $totalPenjualan }}</b>
        </div>
        <div class="link-orderan" style="background: linear-gradient(to top, #fefefe, #e3ff74);">
            Banyak Dibeli 
            <br>
            <b>{{ $totalBanyakDibeli }}</b>
        </div>
        <div class="link-orderan" style="  background: linear-gradient(to top, #fefefe, #87fe8f);">
            Pendapatan 
            <br>
            <b>@currency($totalPendapatan)</b>
        </div>
    </div>
    </div>
    </div>


    <!-- resources/views/menu_items.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Menu Items</title>
</head>
<body>
    <h1>Menu Items</h1>

    @foreach ($orderCards as $orderCard)
        <h2>Order ID: {{ $orderCard->id }}</h2>
        <ul>
            @php
                $menuItems = explode(', ', $orderCard->menu);
                $quantities = explode(', ', $orderCard->jumlah);
            @endphp

            @foreach ($menuItems as $index => $menuItem)
            <li>{{ $menuItem }} - Quantity: {{ $quantities[$index] }}</li>
            @endforeach
            {{-- @foreach ($jumlahItems as $menuItem)
                <li>{{ $menuItem }}</li>
            @endforeach --}}
        </ul>
    @endforeach

   data : {{ $totalQuantity }}
</body>
</html>

 


@endsection
