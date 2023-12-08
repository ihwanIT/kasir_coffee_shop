@extends('layout.mainKasir')
@section('title', 'Orders')
@section('orders')
@php
$daftarOrder = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
    {{-- modal tambah orderan --}}
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Orderan baru</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/orders" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                  <input type="text" class="form-control" id="recipient-name" name="name_costumer" required>
                </div>
              
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Minuman</label>
                  <div class="input-group">
                    <select class="form-select" id="myDropdowns" onchange="displaySelectedValuess()" aria-label="Example select with button addon">
                      <option selected>Nama Minuman</option>
                      @foreach ($menus as $item_menu)
                      <option value="{{ $item_menu->nama }},{{ $item_menu->harga }}">{{ $item_menu->nama }}</option>
                      @endforeach                  
                    </select>
                  </div>
                </div>
                {{-- input harga menu --}}
                <input type="hidden" name="pesanan" id="selectedValuesHarga">

                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Harga</label>
                  <input type="text" class="form-control" id="selectedValuess" name="harga" readonly>
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah_total_pembelian_menu" name="jumlah" onchange="displaySelectedValuess()" min="1" value="1" required>
                </div>
                <div class="mb-3">
                  <label for="total_harga_jual" class="col-form-label">Total</label>
                  <input type="text" class="form-control" id="total_harga_jual" name="total_harga_jual" readonly>
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Keterangan</label>
                  <textarea class="form-control" id="message-text" name="keterangan" required></textarea>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn" style="background-color: green;">Tambah</button>
            </div>        
          </form>
          </div>
        </div>
      </div>
    {{-- end --}}

    {{-- modal edit orderan --}}
        <div class="modal fade" id="edit_orders" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Orderan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/orders" method="POST">
                @csrf
                @method('PUT')

                
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                  <input type="text" class="form-control" id="name_costumer" name="name_costumer" required>
                </div>

                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Minuman</label>
                  <div class="input-group">
                    <select class="form-select" id="myDropdowns" name="nama_orderan" onchange="displaySelectedValuess()" aria-label="Example select with button addon">
                      <option selected>Nama Minuman</option>
                      @foreach ($menus as $item_menu)
                      <option value="{{ $item_menu->nama }}">{{ $item_menu->nama }}</option>
                      @endforeach                  
                    </select>
                  </div>
                </div>
                
                {{-- input harga menu --}}
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" readonly>
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" onchange="displaySelectedValuess()" min="1" value="1" required>
                </div>
                <div class="mb-3">
                  <label for="total_harga_jual" class="col-form-label">Total</label>
                  <input type="text" class="form-control" id="total_harga_jual" name="total_harga_jual" readonly>
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Keterangan</label>
                  <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn" style="background-color: yellow;">Save</button>
            </div>
          </form>
          </div>
        </div>
      </div>

    {{-- end --}}

    {{-- modal hapus orderan --}}
    <div class="modal fade" id="hapus_orders" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Orderan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/ordersHapus" method="POST">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                  <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli">
                </div>
              
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Minuman</label>
                  <div class="input-group">
                    <select class="form-select" id="nama_orderan" aria-label="Example select with button addon" name="nama_orderan">
                      <option selected>Nama Minuman</option>
                      @foreach ($menus as $item_menu)
                      <option value="{{ $item_menu->nama }}">{{ $item_menu->nama }}</option>
                      @endforeach                  
                    </select>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Keterangan</label>
                  <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" readonly>
                </div>
                <div class="mb-3">
                  <label for="total_harga_jual" class="col-form-label">Total</label>
                  <input type="text" class="form-control" id="total_harga_jual" name="total_harga_jual" readonly>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn" style="background-color: red;">Hapus</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    {{-- end --}}

    

<h4 style="background-color: rgb(78, 78, 255); margin:0px; color:white; padding:10px; border-radius:0px 0px 10px 10px;">Orders</h4>

{{-- search cari orderan --}}
<div class="search">
  <div>
    <button data-bs-target="#exampleModal" data-bs-toggle="modal"  style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Orderan <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></button>
  </div>

  <form action="/orders">
    @csrf
    <input type="search" name="search_orders" id="search_orders" placeholder="Cari Orders" value="{{ request('search_orders') }}">
    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
  </form>
</div>
{{-- end --}}

<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Id</th>
        <th scope="col">Nama Pemesan</th>
        <th scope="col">Pesanan</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Harga</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Total</th>
        <th scope="col">Waktu</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
     <tbody> 
      <tr>
        @foreach ($orders as $item_menu)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item_menu->id }}</td>
            <td>{{ $item_menu->nama_pembeli }}</td>
            <td>{{ $item_menu->nama_orderan }}</td>
            <td>{{ $item_menu->keterangan }}</td>
            <td>@currency($item_menu->harga)</td>
            <td>{{ $item_menu->jumlah }}</td>
            <td>@currency($item_menu->total)</td>
            <td>{{ $item_menu->created_at->format('d-m-Y') }}</td>
            <td>
                    {{-- <button type="button" class="btn-edit-orders" data-bs-target="#edit_orders" data-bs-toggle="modal" data-myid="{{ $item_menu->id }}" data-myname_pembeli="{{ $item_menu->nama_pembeli }}" data-myorderan="{{ $item_menu->nama_orderan }}" data-myketerangan="{{ $item_menu->keterangan }}" data-myjumlah="{{ $item_menu->jumlah }}" data-mytotal="{{ $item_menu->total }}" data-myharga="{{ $item_menu->harga }}" style="border: 0; background-color: yellow; font-size: small; border-radius: 5px;" id="edit_orders">
                      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                    </button> --}}
                    <button type="button" class="btn-edit-orders" data-bs-target="#hapus_orders" data-bs-toggle="modal" data-myid="{{ $item_menu->id }}" data-myname_pembeli="{{ $item_menu->nama_pembeli }}" data-myorderan="{{ $item_menu->nama_orderan }}" data-myketerangan="{{ $item_menu->keterangan }}" data-myjumlah="{{ $item_menu->jumlah }}" data-mytotal="{{ $item_menu->total }}" data-myharga="{{ $item_menu->harga }}" style="border: 0; background-color: red; color: white; font-size: small; border-radius: 2px;" id="hapus_orders">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                      Delete
                    </button>
            </td>
        </tr>
    @endforeach
      </tr>
      </tbody>
  </table>
  
  {{ $orders->links() }}


  {{-- grafik penjualan --}}
{!! $orderCard->container() !!}

<script src="{{ $orderCard->cdn() }}"></script>

{{ $orderCard->script() }}



@endsection