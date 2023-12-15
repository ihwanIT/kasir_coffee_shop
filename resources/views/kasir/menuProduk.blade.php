@extends('layout.mainKasir')
@section('menuProduk')
@section('title', 'Menu')
@php
    $menukopi = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
{{-- modal tambah menu --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(86, 86, 248); color:white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Menu Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('MenuProduk.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="recipient-name" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Kategori</label>
                        <div class="input-group">
                            <select class="form-select" name="kategori" aria-label="Example select with button addon">
                                <option value="Minuman">Minuman</option>
                                <option value="Makanan">Makanan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Harga</label>
                        <input type="number" class="form-control" id="recipient-name" name="harga" value="1"
                            min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Jumlah</label>
                        <input type="number" class="form-control" id="recipient-name" name="jumlah" value="1"
                            min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tambah Foto</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn" type="submit"
                    style="background-color: rgb(86, 86, 248); color:white">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}
{{-- modal edit menu --}}
<div class="modal fade" id="edit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255, 255, 104);">
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
                        <label for="recipient-name" class="col-form-label">Nama Minuman</label>
                        <div class="input-group">
                            <select class="form-select" name="kategori" id="kategori"
                                aria-label="Example select with button addon">
                                <option selected>Kategori</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Makanan">Makanan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="col-form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="col-form-label">jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" min="1">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn" style="background-color: rgb(255, 255, 104);">Save</button>
            </div>
        </div>
    </div>
    </form>
</div>
{{-- end --}}

{{-- modal hapus menu --}}
<div class="modal fade" id="hapus" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255, 112, 112);">
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
                    <div class="mb-3">
                        <label for="harga" class="col-form-label">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" disabled>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn"
                    style="background-color: rgb(255, 112, 112); color:white;">Hapus</button>
            </div>
        </div>
    </div>
    </form>
</div>
{{-- end --}}

{{-- valisadi data --}}

{{-- @if (session('error'))
<div class="alert alert-danger" style="margin: 10px; border:0; ">
    <i class="fa-solid fa-circle-check"></i> {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success" style="margin: 10px; border:0; ">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
</div>
@endif --}}

@if ($errors->any())
<div class="alert alert-success" style="margin: 10px; border:0; ">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success" style="margin: 10px; border:0; ">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
</div>
@endif


{{-- end --}}

{{-- search --}}
<div class="search">
    <div>
        <button data-bs-target="#staticBackdrop" data-bs-toggle="modal"
            style="background-color:rgb(89, 89, 255); border:0; border-radius:5px; padding:5px 20px;">Tambah Menu <svg
                xmlns="http://www.w3.org/2000/svg" height="1em" fill="white"
                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
            </svg></button>
    </div>

    {{-- buttom cari menu --}}
    <form action="/MenuProduk">
        @csrf
        <input type="search" name="search" id="search" placeholder="Cari Menu"
            value="{{ request('search') }}">
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white"
                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
            </svg></button>
    </form>
</div>
{{-- end --}}

{{-- end --}}


<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">id</th>
            <th scope="col">Nama</th>
            <th scope="col">Images</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $item_menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item_menu->id }}</td>
                <td>{{ $item_menu->nama }}</td>
                @if ($item_menu->image)
                    <td><img src="{{ asset('storage/' . $item_menu->image) }}" alt="gambar"
                            style="height: 60px; width:60px;"></td>
                @else
                    <td><img src="assets/menu2.png" class="card-img-top" alt="gambar"
                            style="height: 60px; width:60px;"></td>
                @endif

                {{-- <td>{{ $item_menu->image }}</td> --}}
                <td>{{ $item_menu->kategori }}</td>
                <td>@currency($item_menu->harga)</td>
                <td>{{ $item_menu->jumlah }}</td>
                <td>
                    <button type="button" class="btn-edit" data-bs-target="#edit" data-bs-toggle="modal"
                        data-myid="{{ $item_menu->id }}" data-myname="{{ $item_menu->nama }}"
                        data-mykategori="{{ $item_menu->kategori }}" data-myharga="{{ $item_menu->harga }}"
                        data-myjumlah="{{ $item_menu->jumlah }}"
                        style="border: 0; background-color: rgb(255, 255, 96); font-size: small; border-radius: 20px; padding:5px;"
                        id="edit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                        </svg>
                        Edit
                    </button>

                    <button type="button" class="btn-edit" data-bs-target="#hapus" data-bs-toggle="modal"
                        data-myid="{{ $item_menu->id }}" data-myname="{{ $item_menu->nama }}"
                        data-mykategori="{{ $item_menu->kategori }}" data-myharga="{{ $item_menu->harga }}"
                        data-myjumlah="{{ $item_menu->jumlah }}"
                        style="border: 0; background-color: rgb(255, 52, 52); color:white; font-size: small; border-radius: 20px; padding:5px;"
                        id="hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

{{ $menu->links() }}
@endsection
