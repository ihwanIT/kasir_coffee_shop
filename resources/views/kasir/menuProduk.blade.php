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
                    <form action="{{ route('MenuProduk.create') }}" method="post">
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
                    <button class="btn" type="submit" style="background-color: blue; color:white">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}
    {{-- modal edit menu --}}
    <div class="modal fade" id="edit" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/MenuProduk" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_menu" id="id_menu">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" >
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="col-form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga">
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

    {{-- modal hapus menu --}}
    <div class="modal fade" id="hapus" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin hapus menu ini ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/MenuProdukHapus" method="post">
                    {{-- <form action="{{ route('MenuProduk.delete') }}" method="post"> --}}
                        @csrf
                        <input type="hidden" name="id_menu" id="id_menu">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama" disabled>
                            {{-- <span name="nama" id="nama"></span> --}}
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="col-form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" disabled>
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

    <h3>Menu</h3>
    {{-- search --}}
    <div class="search">
        <div>
            <button data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Menu &plus;</button>
            <button style="background-color: red;" data-bs-target="#exampleModalHapus" data-bs-toggle="modal">Hapus Menu</button>
        </div>

        {{-- buttom cari menu --}}
        <form action="/MenuProduk">
            <input type="search" name="search" id="search" placeholder="Cari Menu" value="{{ request('search') }}">
            <button type="submit">Cari</button>
        </form>
        {{-- <div class="invalid-login">
            @error('error')
            {{ $message="masukan data yang benar!" }}
        @enderror
        </div> --}}
    </div>
    {{-- end --}}

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
                    <td>{{ $item_menu->id }}</td>
                    <td>{{ $item_menu->nama }}</td>
                    <td>{{ $item_menu->kategori }}</td>
                    <td>{{ $item_menu->harga }}</td>
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

        </tbody>
    </table>

    {{ $menu->links() }}
@endsection
