@extends('layout.mainKasir')
@section('menuProduk')
@php
$menukopi = 'red'; // Mengatur warna teks menjadi putih
@endphp
    {{-- modal tambah menu --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Menu Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/MenuProduk" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="recipient-name" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="recipient-name" name="kategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Harga</label>
                            <input type="text" class="form-control" id="recipient-name" name="harga" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn" type="submit" style="background-color: green;">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}
    {{-- modal edit menu --}}
    <div class="modal fade" id="exampleModalEdit" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="recipient-name" value="hhhh">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Harga</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" style="background-color: green;">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    <h3>Menu</h3>
    {{-- search --}}
    <div class="search">
        <div>
            <button data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Menu</button>
            <select name="" id="">
                <option value="">Makanan</option>
                <option value="">Minuman</option>
                <option value="">Coffee</option>
            </select>
            <button style="background-color: red;" data-bs-target="#exampleModalHapus" data-bs-toggle="modal">Hapus</button>

        </div>
        <form action="" method="post">
            <input type="search" name="" id="" placeholder="Cari Menu">
            <button type="submit">Cari</button>
        </form>
    </div>
    {{-- end --}}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">No</th>
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $item_menu)
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item_menu->id_menu }}</td>
                    <td>{{ $item_menu->nama }}</td>
                    <td>{{ $item_menu->kategori }}</td>
                    <td>{{ $item_menu->harga }}</td>
                    <td>
                        <button data-bs-target="#exampleModalEdit" data-bs-toggle="modal" style="border: 0;"><img
                                src="assets/icon/edit.png" alt="edit"></button>
                        <button data-bs-target="#exampleModal" data-bs-toggle="modal" style="border: 0;"><img
                                src="assets/icon/delete.png" alt="hapus"></button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
