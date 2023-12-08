@extends('layout.mainKasir')
@section('title', 'Admin')
@section('admin')
@php
$admin = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
<h4 style="background-color: rgb(78, 78, 255); margin:0px; color:white; padding:10px; border-radius:0px 0px 10px 10px;">Admin</h4>

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
             <form action="{{ route('admin.create') }}" method="post">
                 @csrf
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
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
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
<div class="modal fade" id="editAdmin" data-bs-backdrop="static" tabindex="-1"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                 <div class="mb-3">
                     <label for="recipient-name" class="col-form-label">Password</label>
                     <input type="text" class="form-control" id="password" name="password" required>
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
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" disabled>
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
         <th scope="col">Nama Lengkap</th>
         <th scope="col">Email</th>
         <th scope="col">Username</th>
         <th scope="col">Password</th>
         <th scope="col">Pembuatan akun</th>
         <th scope="col">Action</th>
     </tr>
 </thead>
 <tbody>
     @foreach ($admins as $user_admin)
         <tr>
             {{-- <td><input type="checkbox" name="" id=""></td> --}}
             {{-- <td>{{ $loop->iteration }}</td> --}}
             <td>{{ $user_admin->id }}</td>
             <td>{{ $user_admin->nama }}</td>
             <td>{{ $user_admin->email }}</td>
             <td>{{ $user_admin->username }}</td>
             <td>{{ $user_admin->password }}</td>
             <td>{{ $user_admin->created_at->format('d-m-Y') }}</td>
             <td>
                     <button type="button" class="btnEditAdmin" data-bs-target="#editAdmin" data-bs-toggle="modal" data-id="{{ $user_admin->id }}" data-nama="{{ $user_admin->nama }}" data-email="{{ $user_admin->email }}" data-username="{{ $user_admin->username }}" data-password="{{ $user_admin->password }}" style="border: 0; background-color: yellow; font-size: small; border-radius: 5px;" id="editAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg>
                    </button>
                     <button type="button" class="btnEditAdmin" data-bs-target="#hapusAdmin" data-bs-toggle="modal" data-id="{{ $user_admin->id }}" data-nama="{{ $user_admin->nama }}" data-email="{{ $user_admin->email }}" data-username="{{ $user_admin->username }}" data-password="{{ $user_admin->password }}" style="border: 0; background-color: red; font-size: small; border-radius: 5px;" id="hapusAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                    </button>
             </td>
         </tr>
     @endforeach

 </tbody>
</table>

{{-- {{ $admins->links() }} --}}
@endsection