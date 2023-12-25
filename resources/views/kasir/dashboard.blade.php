@extends('layout.mainKasir')
@section('title', 'Dashboard')
@section('dashboard')
@php
$textColor = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
    <div class="container-card">
        <div class="card-date" style=" border-left:30px solid rgb(155, 155, 254); cursor: pointer; " data-bs-target="#penjualanharian" data-bs-toggle="modal">
            <p>
                <span style="font-size: 13px;">Penjualan harian</span>
                <br>
                @if($totalQuantity > 0)
                <span>
                    {{ $totalQuantity }}
                    @else
                    <span>Tidak ada penjualan</span>
                    @endif
                </span>
                
            </p>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 100 100">
                <circle cx="79" cy="14" r="1" fill="#f1bc19"></circle><circle cx="50" cy="51" r="37" fill="#c0e5e4"></circle><circle cx="85" cy="16" r="4" fill="#f1bc19"></circle><circle cx="13" cy="30" r="2" fill="#00a5a5"></circle><circle cx="80" cy="79" r="2" fill="#fbcd59"></circle><circle cx="26" cy="77" r="4" fill="#fbcd59"></circle><circle cx="27" cy="88" r="2" fill="#00a5a5"></circle><circle cx="58.5" cy="81.5" r="2.5" fill="#fff"></circle><circle cx="23.029" cy="69.971" r=".971" fill="#fff"></circle><circle cx="85" cy="32" r="1" fill="#f1bc19"></circle><circle cx="78" cy="69" r="2" fill="#fff"></circle><circle cx="79" cy="35" r="1" fill="#fff"></circle><path fill="#fdfcef" d="M27.73,64.78V35.135c0-4.09,3.316-7.405,7.405-7.405h29.646c4.09,0,7.405,3.315,7.405,7.405v29.646	c0,4.09-3.316,7.405-7.405,7.405H35.135C31.045,72.185,27.73,68.87,27.73,64.78z"></path><path fill="#472b29" d="M65.007,28.405c3.639,0.001,6.599,2.963,6.598,6.602l-0.01,30c-0.001,3.639-2.963,6.599-6.602,6.598	l-30-0.01c-3.639-0.001-6.599-2.963-6.598-6.602l0.01-30c0.001-3.639,2.963-6.599,6.602-6.598L65.007,28.405 M65.008,27.005	l-30-0.01c-4.418-0.002-8.001,3.579-8.003,7.997l-0.01,30c-0.002,4.418,3.579,8.001,7.997,8.003l30,0.01	c4.418,0.002,8.001-3.579,8.003-7.997l0.01-30C73.007,30.59,69.426,27.007,65.008,27.005L65.008,27.005z"></path><path fill="#472b29" d="M69.5,42c-0.276,0-0.5-0.224-0.5-0.5v-6c0-2.481-2.019-4.5-4.5-4.5h-13c-0.276,0-0.5-0.224-0.5-0.5	s0.224-0.5,0.5-0.5h13c3.033,0,5.5,2.467,5.5,5.5v6C70,41.776,69.776,42,69.5,42z"></path><path fill="#472b29" d="M48.5,31h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5	S48.776,31,48.5,31z"></path><path fill="#472b29" d="M64.5,70h-29c-3.033,0-5.5-2.467-5.5-5.5v-29c0-3.033,2.467-5.5,5.5-5.5h7c0.276,0,0.5,0.224,0.5,0.5	S42.776,31,42.5,31h-7c-2.481,0-4.5,2.019-4.5,4.5v29c0,2.481,2.019,4.5,4.5,4.5h29c2.481,0,4.5-2.019,4.5-4.5v-4	c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v4C70,67.533,67.533,70,64.5,70z"></path><path fill="#472b29" d="M69.5,58c-0.276,0-0.5-0.224-0.5-0.5v-9c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v9	C70,57.776,69.776,58,69.5,58z"></path><path fill="#05a597" d="M61.462,62.498H38.553c-0.574,0-1.04-0.467-1.04-1.043V38.527c0-0.576,0.466-1.043,1.04-1.043h22.909	c0.574,0,1.04,0.467,1.04,1.043v22.928C62.503,62.031,62.037,62.498,61.462,62.498z M39.489,60.5h21.016V39.484H39.489V60.5z"></path><path fill="#472b29" d="M61.462,62.998h-22.91c-0.849,0-1.54-0.692-1.54-1.543V38.527c0-0.851,0.691-1.543,1.54-1.543h22.91	c0.849,0,1.54,0.692,1.54,1.543v22.928C63.002,62.306,62.312,62.998,61.462,62.998z M38.553,37.984c-0.298,0-0.54,0.244-0.54,0.543	v22.928c0,0.299,0.242,0.543,0.54,0.543h22.91c0.298,0,0.54-0.244,0.54-0.543V38.527c0-0.299-0.242-0.543-0.54-0.543H38.553z M61.004,61H38.989V38.984h22.016V61z M39.989,60h20.016V39.984H39.989V60z"></path><path fill="#05a597" d="M50.022,52.285c-3.306,0-5.996-2.69-5.996-5.996V43h2v3.29c0,2.204,1.792,3.996,3.996,3.996	s3.996-1.792,3.996-3.996V43h2v3.29C56.019,49.595,53.329,52.285,50.022,52.285z"></path><path fill="#472b29" d="M50.022,52.785c-3.582,0-6.496-2.914-6.496-6.496V43c0-0.276,0.224-0.5,0.5-0.5h2	c0.276,0,0.5,0.224,0.5,0.5v3.29c0,1.928,1.568,3.496,3.496,3.496s3.496-1.568,3.496-3.496V43c0-0.276,0.224-0.5,0.5-0.5h2	c0.276,0,0.5,0.224,0.5,0.5v3.29C56.519,49.871,53.604,52.785,50.022,52.785z M44.526,43.5v2.79c0,3.031,2.465,5.496,5.496,5.496	s5.496-2.465,5.496-5.496V43.5h-1v2.79c0,2.479-2.017,4.496-4.496,4.496s-4.496-2.017-4.496-4.496V43.5H44.526z"></path><polygon fill="#05a597" fill-rule="evenodd" points="55.488,53.226 56.314,54.74 58.009,55.058 56.825,56.311 57.046,58.022 55.488,57.283 53.93,58.022 54.151,56.311 52.967,55.058 54.662,54.74" clip-rule="evenodd"></polygon><path fill="#472b29" d="M53.93,58.521c-0.104,0-0.207-0.032-0.294-0.096c-0.148-0.107-0.226-0.287-0.202-0.468l0.191-1.476	l-1.021-1.081c-0.126-0.133-0.169-0.324-0.112-0.498c0.057-0.174,0.204-0.303,0.383-0.337l1.462-0.274l0.712-1.306	c0.176-0.32,0.702-0.32,0.878,0l0.712,1.306l1.462,0.274c0.18,0.034,0.327,0.163,0.383,0.337c0.057,0.174,0.014,0.365-0.112,0.498	l-1.021,1.081l0.191,1.475c0.023,0.182-0.054,0.361-0.202,0.469c-0.147,0.108-0.342,0.125-0.508,0.047l-1.344-0.637l-1.344,0.637	C54.076,58.505,54.003,58.521,53.93,58.521z M53.96,55.38l0.555,0.587c0.103,0.109,0.152,0.259,0.133,0.407l-0.104,0.802l0.73-0.346	c0.136-0.064,0.293-0.064,0.429,0l0.73,0.346l-0.104-0.802c-0.019-0.149,0.03-0.299,0.133-0.408l0.555-0.587l-0.794-0.149	c-0.147-0.027-0.275-0.12-0.347-0.251l-0.387-0.71l-0.387,0.71c-0.072,0.131-0.199,0.224-0.347,0.251L53.96,55.38z"></path>
                </svg> --}}
            <img src="assets/icon/db2.ico" alt="" width="40px" height="40px">

        </div>
        <div class="card-date" style=" border-left:30px solid rgb(255, 255, 132); cursor:pointer;" data-bs-target="#banyakdibeli" data-bs-toggle="modal">
            <p>
                <span style="font-size: 13px;">Banyak Dibeli harian</span>
        
                <br>
                @if(isset($mostOrderedMenu))
                    <span>Menu : {{ $mostOrderedMenu }}</span>
                    <br>
                    <span>Jumlah : {{ $maxQuantity }}</span>
                @else
                    <span>Tidak ada Penjualan</span>
                @endif
                </span>
            </p>
            <img src="assets/icon/db1.ico" alt="" width="40px" height="40px">
            

        </div>
        <div class="card-date" style=" border-left:30px solid rgb(114, 202, 114); cursor: pointer;" data-bs-target="#pendapatanharian" data-bs-toggle="modal">
            <p>
                <span style="font-size: 13px;">    Pendapatan harian</span>
            
                <br>
                @if($pendapatan_penjualans > 0)
                <span>
                @currency($pendapatan_penjualans)
                @else
                <span>Tidak ada penjualan</span>
                @endif
                </span>
            </p>
            <img src="assets/icon/db3.ico" alt="" width="40px" height="40px">

        </div>
    </div>

    {{-- modal paling banyak dibeli --}}
    <div class="modal fade" id="banyakdibeli" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(253, 253, 125);">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Paling Banyak Dibeli :
                    @if(isset($mostOrderedMenu))
                    <span> {{ $mostOrderedMenu}}</span>
                @else
                    <span>Tidak ada orderan pada hari ini.</span>
                @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                @if($dataOrderTable->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No Transaksi</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah penjualan</th>
                            <th scope="col">Total penjualan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrderTable as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->menu }}</td>
                        <td>{{ $item->sub_harga}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>@currency($item->total_harga)</td>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: rgb(253, 253, 125); border:0; color:black;">Ok</button>
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
                    <span> : {{ $totalQuantity }}</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                @if($dataOrderTable->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No Transaksi</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah penjualan</th>
                            <th scope="col">Total penjualan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrderTable as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->menu }}</td>
                        <td>{{ $item->sub_harga}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>@currency($item->total_harga)</td>
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
                @if($dataOrderTable->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No Transaksi</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah penjualan</th>
                            <th scope="col">Total penjualan</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrderTable as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->menu }}</td>
                        <td>{{ $item->sub_harga}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>@currency($item->total_harga)</td>
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

        <h5 style="text-align: center;">Stok kurang dari 10</h5>
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
    {{ $lowStok->links() }}
    <br>
    <a href="/MenuProduk">
    <button>Tambah <i class="fa-solid fa-circle-plus"></i></button>
</a>

</div>
    {{-- ========== --}}
       <div class="card-grafik">

        {!! $orderCard->container() !!}

        <script src="{{ $orderCard->cdn() }}"></script>
        
        {{ $orderCard->script() }}
</div>

    </div>

    <div class="daftar-orderan">
        <div class="orderan">
            <h5 style="text-align: center;">Orderan belum Selesai</h5>
            @if($orderChard->count() > 0)
            <table class="table table-striped table-hover">
                
                <thead>
                    <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Total</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderChard as $item)
                    <tr>
                    <td>{{ $item->menu }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->sub_harga }}</td>
                    <td>@currency($item->total_harga)</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            @else
            <center style="margin: 20px 0px;"><p>Tidak ada orderan.</p></center>
        @endif
        {{ $orderChard->links() }}
        <a href="/transaksi" style="text-decoration: none; background:none;">
            <button style="background-color: #51ca59; border:0; border-radius:20px; padding:10px 20px;">Selesaikan Orderan <i class="fa-solid fa-clipboard-check"></i> </button>
        </a>
        </div>
        <div class="data-penjualan-seluruh">
            <b>Data penjualan sampai dengan Tanggal : {{ $tanggal }}</b>
            <div class="container-data">
        <div class="link-orderan" style="background: linear-gradient(to top, #fefefe, #7e64ff);" >
            Penjualan 
            <br>
            <b>{{ $totalQuantityAll }}</b>
        </div>
        <div class="link-orderan" style="background: linear-gradient(to top, #fefefe, #e3ff74);">
            Banyak Dibeli 
            <br>
            <b>{{ $mostOrderedMenuAll }}</b>
            <br>
            <b>{{ $maxQuantityAll }}</b>

        </div>
        <div class="link-orderan" style="  background: linear-gradient(to top, #fefefe, #87fe8f);">
            Pendapatan 
            <br>
            <b>@currency($pendapatan_penjualanBulanan)</b>
        </div>
    </div>
    </div>
    </div>
@endsection
