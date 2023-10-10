@extends('layout.mainKasir')
@section('menuProduk')
    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Menu Baru</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Produk</label>
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
                  <label for="message-text" class="col-form-label">Keterangan</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn" style="background-color: green;">Tambah Menu</button>
            </div>
          </div>
        </div>
      </div>
    {{-- end --}}

<h3>Menu</h3>
<br>
<table class="table table-striped table-hover">
    <button data-bs-target="#exampleModal" data-bs-toggle="modal"  style="background-color:green; border:0; border-radius:5px; padding:5px 20px; margin-right:10px;">Tambah menu</button>
    <select name="" id="">
        <option value="">Makanan</option>
        <option value="">Minuman</option>
        <option value="">Coffee</option>
    </select>
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Kategori</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>alin</td>
          <td>data</td>
          <td>placeholder</td>
          <td>text</td>
    
        </tr>
        <tr>
          <td>1,002</td>
          <td>radit</td>
          <td>irrelevant</td>
          <td>visual</td>
          <td>layout</td>
        
        </tr>
        <tr>
          <td>1,003</td>
          <td>ayu</td>
          <td>rich</td>
          <td>dashboard</td>
          <td>tabular</td>
      
        </tr>
 
      </tbody>
  </table>
@endsection