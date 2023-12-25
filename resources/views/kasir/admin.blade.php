@extends('layout.mainKasir')
@section('title', 'Admin')
@section('admin')
    @php
        $admin = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
    @endphp

    {{-- notif validasi --}}
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

    {{-- modal tambah stok --}}
    <div class="modal fade" id="tambahStok" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Admin Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Tambah Foto</label>
                            <input class="form-control" type="file" id="image" name="image">
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
    <div class="modal fade" id="editAdmin" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_admin" id="id_admin">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        {{-- <div class="mb-3">
                     <label for="recipient-name" class="col-form-label">Password</label>
                     <input type="text" class="form-control" id="password" name="password" required>
                 </div> --}}
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
    <div class="modal fade" id="hapusAdmin" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin hapus Akun ini ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/adminHapus" method="post">
                        {{-- <form action="{{ route('MenuProduk.delete') }}" method="post"> --}}
                        @csrf
                        <input type="hidden" name="id_admin" id="id_admin">


                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" disabled>
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
            <button data-bs-target="#tambahStok" data-bs-toggle="modal"
                style="background-color:blue; border:0; border-radius:5px; padding:5px 20px;">Tambah Admin Baru <svg
                    xmlns="http://www.w3.org/2000/svg" height="1em" fill="white"
                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg></button>
        </div>

        {{-- search stok --}}
        <form action="/persediaan">
            @csrf
            <input type="search" name="search_stoks" id="search_stoks" placeholder="Cari Admin"
                value="{{ request('search_stoks') }}">
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white"
                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg></button>
        </form>
    </div>

    {{-- table --}}
    <div class="" style="background-color: white; padding:20px; border-radius:10px">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                {{-- <th scope="col"></th> --}}
                {{-- <th scope="col">No</th> --}}
                <th scope="col">id</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Foto</th>
                {{-- <th scope="col">Password</th> --}}
                <th scope="col">Pembuatan akun</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $user_admin)
                <tr>
                    <td>{{ $user_admin->id }}</td>
                    <td>{{ $user_admin->nama }}</td>
                    <td>{{ $user_admin->email }}</td>
                    <td>{{ $user_admin->username }}</td>
                    @if ($user_admin->image)
                    <td><img src="{{ asset('storage/' . $user_admin->image) }}" alt="gambar"
                        style="height: 60px; width:60px;"></td>
                    @else
                        <td><img src="assets/foto-user2.png" class="card-img-top" alt="gambar"
                                style="height: 60px; width:60px;"></td>
                    @endif

                    <td>{{ $user_admin->created_at->format('d-m-Y') }}</td>
                    <td>
                        <button type="button" class="btnEditAdmin" data-bs-target="#editAdmin" data-bs-toggle="modal"
                            data-id="{{ $user_admin->id }}" data-nama="{{ $user_admin->nama }}"
                            data-email="{{ $user_admin->email }}" data-username="{{ $user_admin->username }}"
                            data-password="{{ $user_admin->password }}"
                            style="border: 0; background-color: yellow; font-size: small; border-radius: 5px; padding:5px;"
                            id="editAdmin">
                            <i class="fa-solid fa-user-pen"></i>
                            Edit
                        </button>
                        <button type="button" class="btnEditAdmin" data-bs-target="#hapusAdmin" data-bs-toggle="modal"
                            data-id="{{ $user_admin->id }}" data-nama="{{ $user_admin->nama }}"
                            data-email="{{ $user_admin->email }}" data-username="{{ $user_admin->username }}"
                            style="border: 0; background-color: red; font-size: small; border-radius: 5px; padding:5px;"
                            id="hapusAdmin">
                            <i class="fa-solid fa-user-xmark"></i>
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

    {{-- {{ $admins->links() }} --}}
@endsection
