@extends('layout.mainKasir')
@section('title', 'Persediaan')
@section('persediaan')
@php
$persediaan = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
<h4 style="background-color: rgb(78, 78, 255); margin:0px; color:white; padding:10px; border-radius:0px 0px 10px 10px;">Persediaan</h4>

        {{-- modal tambah stok --}}
        <div class="modal fade" id="tambahStok" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Stok Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('persediaan.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama bahan baku</label>
                            <input type="text" class="form-control" id="bahan_baku" name="bahan_baku" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Jumlah stok</label>
                            <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" min="1" required>
                        </div>
                        
                        {{-- <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Satuan pengukuran</label>
                            <input type="text" class="form-control" id="satuan_pengukuran" name="satuan_pengukuran" required>
                        </div> --}}

                        {{-- <select name="satuan_pengukuran" id="satuan_pengukuran">
                            <option value="Kg">Kg</option>
                            <option value="Gram">Gram</option>
                            <option value="Liter">Liter</option>
                            <option value="Mili">Mili</option>
                        </select> --}}

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Satuan Pengukuran</label>
                            <div class="input-group">
                              <select class="form-select" id="satuan_pengukuran" name="satuan_pengukuran" aria-label="Example select with button addon">
                                <option value="Kg">Kg</option>
                                <option value="Gram">Gram</option>
                                <option value="Liter">Liter</option>
                                <option value="Mili">Mili</option>
                              </select>
                            </div>
                          </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Jumlah per saji</label>
                            <input type="number" class="form-control" id="jumlah_cup" name="jumlah_cup" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Harga beli</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                          </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn" type="submit" style="background-color: blue; color:white">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}
    {{-- modal edit stok --}}
    <div class="modal fade" id="editStok" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Stok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('persediaan.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="stok_id" id="stok_id">

                         <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama bahan baku</label>
                            <input type="text" class="form-control" id="bahan_baku" name="bahan_baku" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Jumlah stok</label>
                            <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Satuan pengukuran</label>
                            <input type="text" class="form-control" id="satuan_pengukuran" name="satuan_pengukuran" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Jumlah per saji</label>
                            <input type="text" class="form-control" id="jumlah_cup" name="jumlah_cup" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Harga beli</label>
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: yellow;">Save</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    {{-- end --}}

    {{-- modal hapus stok --}}
    <div class="modal fade" id="hapusStok" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin hapus Stok ini ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/persediaanHapus" method="post">
                    {{-- <form action="{{ route('MenuProduk.delete') }}" method="post"> --}}
                        @csrf
                        <input type="hidden" name="stok_id" id="stok_id">

                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Nama bahan baku</label>
                          <input type="text" class="form-control" id="bahan_baku" name="bahan_baku" disabled>
                      </div>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Jumlah stok</label>
                          <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" disabled>
                      </div>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Satuan pengukuran</label>
                          <input type="text" class="form-control" id="satuan_pengukuran" name="satuan_pengukuran" disabled>
                      </div>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Jumlah per saji</label>
                          <input type="text" class="form-control" id="jumlah_cup" name="jumlah_cup" disabled>
                      </div>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Supplier</label>
                          <input type="text" class="form-control" id="supplier" name="supplier" disabled>
                      </div>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Harga beli</label>
                          <input type="text" class="form-control" id="harga_beli" name="harga_beli" disabled>
                      </div>
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Keterangan</label>
                          <input type="text" class="form-control" id="keterangan" name="keterangan" disabled>
                      </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: red; color:white;">Hapus</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    {{-- end --}}

    {{-- buttom search --}}
    <div class="search">
        <div>
          <button data-bs-target="#tambahStok" data-bs-toggle="modal"  style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Persediaan <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></button>
        </div>

        {{-- search stok --}}
        <form action="/persediaan">
          @csrf
          <input type="search" name="search_stoks" id="search_stoks" placeholder="Cari Persediaan" value="{{ request('search_stoks') }}">
          <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
        </form>
      </div>

      {{-- table --}}
      <table class="table table-striped table-hover">
        <thead>
            <tr>
                {{-- <th scope="col"></th> --}}
                {{-- <th scope="col">No</th> --}}
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Stok</th>
                <th scope="col">Pengukuran</th>
                <th scope="col">Takaran per saji</th>
                <th scope="col">Supplier</th>
                <th scope="col">Harga</th>
                <th scope="col">Tgl Stok</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stoks as $item_stok)
                <tr>
                    {{-- <td><input type="checkbox" name="" id=""></td> --}}
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                    <td>{{ $item_stok->id }}</td>
                    <td>{{ $item_stok->bahan_baku }}</td>
                    <td>{{ $item_stok->jumlah_stok }}</td>
                    <td>{{ $item_stok->satuan_pengukuran }}</td>
                    <td>{{ $item_stok->jumlah_cup }}</td>
                    <td>{{ $item_stok->supplier }}</td>
                    <td>@currency($item_stok->harga_beli)</td>
                    <td>{{ $item_stok->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item_stok->keterangan }}</td>
                    <td>
                            <button type="button" class="btnEditStok" data-bs-target="#editStok" data-bs-toggle="modal" data-stok_id="{{ $item_stok->id }}" data-bahan_baku="{{ $item_stok->bahan_baku }}" data-jumlah_stok="{{ $item_stok->jumlah_stok }}" data-satuan_pengukuran="{{ $item_stok->satuan_pengukuran }}" data-jumlah_cup="{{ $item_stok->jumlah_cup }}" data-supplier="{{ $item_stok->supplier }}" data-harga_beli="{{ $item_stok->harga_beli }}" data-keterangan="{{ $item_stok->keterangan }}" style="border: 0; background-color: yellow; font-size: small; border-radius: 5px;" id="editStok">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </button>

                            <button type="button" class="btnEditStok" data-bs-target="#hapusStok" data-bs-toggle="modal" data-stok_id="{{ $item_stok->id }}" data-bahan_baku="{{ $item_stok->bahan_baku }}" data-jumlah_stok="{{ $item_stok->jumlah_stok }}" data-satuan_pengukuran="{{ $item_stok->satuan_pengukuran }}" data-jumlah_cup="{{ $item_stok->jumlah_cup }}" data-supplier="{{ $item_stok->supplier }}" data-harga_beli="{{ $item_stok->harga_beli }}" data-keterangan="{{ $item_stok->keterangan }}" style="border: 0; background-color: red; font-size: small; border-radius: 5px;" id="hapusStok">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $stoks->links() }}
@endsection