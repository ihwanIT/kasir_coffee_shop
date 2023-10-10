@extends('layout.mainKasir')
@section('dashboard')

  <h3>Dashboard</h3>
  <div class="container-card">
    <div class="card" style="background-color: blue">
      <p>Pengunjung</p>
      <p>100</p>
      
    </div>
    <div class="card" style="background-color: green;">
      <p>Penjualan</p>
      <p>120</p>
      
    </div>
    <div class="card">
      <p>Pendapatan</p>
      <p>500.000</p>
      
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pemesan</th>
          <th scope="col">Pesanan</th>
          <th scope="col">Kategori</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>alin</td>
          <td>data</td>
          <td>placeholder</td>
          <td>text</td>
          <td>text</td>
          <td>text</td>
        </tr>
        <tr>
          <td>1,002</td>
          <td>radit</td>
          <td>irrelevant</td>
          <td>visual</td>
          <td>layout</td>
          <td>layout</td>
          <td>layout</td>
        </tr>
        <tr>
          <td>1,003</td>
          <td>ayu</td>
          <td>rich</td>
          <td>dashboard</td>
          <td>tabular</td>
          <td>tabular</td>
          <td>tabular</td>
        </tr>
 
      </tbody>
    </table>
  </div>

@endsection