@extends('layout.mainKasir')
@section('orders')
@php
$order = 'red'; // Mengatur warna teks menjadi putih
@endphp
    {{-- modal --}}
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan orderan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Pesanan</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Kategori</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Harga</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Jumlah</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">No Meja</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Total</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Keterangan</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn" style="background-color: green;">Tambah</button>
            </div>
          </div>
        </div>
      </div>
    {{-- end --}}

<h3>Orders</h3>

{{-- search --}}
<div class="search">
  <div>
    <button data-bs-target="#exampleModal" data-bs-toggle="modal"  style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Orderan</button>
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
        <th scope="col">Nama Pemesan</th>
        <th scope="col">Pesanan</th>
        <th scope="col">Jenis</th>
        <th scope="col">Kategori</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Harga</th>
        <th scope="col">Jumlah</th>
        <th scope="col">total</th>
        <th scope="col">Waktu</th>
      </tr>
      </thead>
      <tr>
        <td><input type="checkbox" name="" id=""></td>
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
        
        {{-- <td style="display:flex; text-align:center;">
          <button class="buttom-action-orders" style="background-color: yellow;">Edit</button>
          <button class="buttom-action-orders" style="background-color: red;">Hapus</button>
        </td> --}}
      </tr>
      </tbody>
  </table>
@endsection