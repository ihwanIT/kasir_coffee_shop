@extends('layout.mainKasir')
@section('orders')
@php
$order = 'red'; // Mengatur warna teks menjadi putih
@endphp
    {{-- modal tambah orderan --}}
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Orderan baru mu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/orders" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                  <input type="text" class="form-control" id="recipient-name" name="name_costumer">
                </div>
              
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Minuman</label>
                  <div class="input-group">
                    <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="pesanan">
                      @foreach ($orders as $item_menu)
                      <option selected>Nama Minuman</option>
                      <option value="{{ $item_menu->keterangan }}">{{ $item_menu->keterangan }}</option>
                      @endforeach                  
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Jumlah</label>
                  <input type="number" class="form-control" id="recipient-name" name="jumlah">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Keterangan</label>
                  <textarea class="form-control" id="message-text" name="keterangan"></textarea>
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

<h3>Orders</h3>

{{-- search --}}
<div class="search">
  <div>
    <button data-bs-target="#exampleModal" data-bs-toggle="modal"  style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Orderan &plus;</button>
    {{-- <button style="background-color: yellow;">Edit</button> --}}
    <button style="background-color: red;">Hapus</button>
  </div>
  <form action="" method="post">
    <input type="search" name="" id="" placeholder="Cari Orders">
    <button type="submit">Cari</button>
  </form>
</div>
{{-- end --}}

<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">No</th>
        <th scope="col">Id</th>
        <th scope="col">Nama Pemesan</th>
        <th scope="col">Pesanan</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Waktu</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
     <tbody> 
      <tr>
        @foreach ($orders as $item_menu)
        <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item_menu->id }}</td>
            <td>{{ $item_menu->nama_pembeli }}</td>
            <td>{{ $item_menu->nama_orderan }}</td>
            <td>{{ $item_menu->keterangan }}</td>
            <td>{{ $item_menu->jumlah }}</td>
            <td>{{ $item_menu->created_at }}</td>
            <td>
                    <button type="button" class="btn-edit" data-bs-target="#edit" data-bs-toggle="modal" data-myid="{{ $item_menu->id }}" data-myname="{{ $item_menu->nama }}" data-mykategori="{{ $item_menu->kategori }}" data-myharga="{{ $item_menu->harga }}" style="border: 0; background-color: yellow; font-size: small; border-radius: 5px;" id="edit">
                        Edit
                    </button>
                    <button type="button" class="btn-edit" data-bs-target="#hapus" data-bs-toggle="modal" data-myid="{{ $item_menu->id }}" data-myname="{{ $item_menu->nama }}" data-mykategori="{{ $item_menu->kategori }}" data-myharga="{{ $item_menu->harga }}" style="border: 0; background-color: red; font-size: small; border-radius: 5px;" id="hapus">
                        Hapus
                    </button>
            </td>
        </tr>
    @endforeach
      </tr>
      </tbody>
  </table>
@endsection