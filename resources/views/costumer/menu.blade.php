@extends('layout.main')
@section('menu')
    {{-- <div class="content"></div> --}}
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/bg-coffee-4.jpg" class="d-block w-100"  alt="gambar">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/bg-coffee-2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/bg-coffee-3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    {{-- menu --}}
    <div class="title-card">
      {{-- <select name="" id="" class="menu-select">
        <option value="">MAKANAN</option>
        <option value="">MINUMAN</option>
        <option value="">COFFEE</option>
      </select> --}}
      <h3><img src="assets/icon/icon-minuman-1.png" alt=""> MINUMAN</h3>
    </div>
    <div class="container-menu">

      <div class="menu">

        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/coffee.jpeg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <label>
                  
                  <h5 class="card-title">Lattee</h5>
                  <input type="checkbox" class="menu-checkbox" id="checkbox" data-harga="25.000">
                </label>
                  <br>
              
                <p class="card-text"><small class="text-body-secondary">Rp.25.000</small></p>
              
              </div>
            </div>
          </div>
        </div>
  
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/coffee.jpeg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <label>
                  
                  <h5 class="card-title">Lattee</h5>
                  <input type="checkbox" class="menu-checkbox" id="checkbox" data-harga="25.000">
                </label>
                  <br>
              
                <p class="card-text"><small class="text-body-secondary">Rp.25.000</small></p>
              
              </div>
            </div>
          </div>
        </div>
  
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/coffee.jpeg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <label>
                  
                  <h5 class="card-title">Lattee</h5>
                  <input type="checkbox" class="menu-checkbox" id="checkbox" data-harga="25.000">
                </label>
                  <br>
              
                <p class="card-text"><small class="text-body-secondary">Rp.25.000</small></p>
              
              </div>
            </div>
          </div>
        </div>
  
      </div>
    
    <div class="menu">

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="assets/coffee.jpeg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <label>
                
                <h5 class="card-title">Lattee</h5>
                <input type="checkbox" class="menu-checkbox" id="checkbox" data-harga="25.000">
              </label>
                <br>
            
              <p class="card-text"><small class="text-body-secondary">Rp.25.000</small></p>
            
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="assets/coffee.jpeg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <label>
                
                <h5 class="card-title">Lattee</h5>
                <input type="checkbox" class="menu-checkbox" id="checkbox" data-harga="25.111">
              </label>
                <br>
            
              <p class="card-text"><small class="text-body-secondary">Rp.25.000</small></p>
            
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="assets/coffee.jpeg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <label>
                
                <h5 class="card-title">Latteek</h5>
                <input type="checkbox" class="menu-checkbox" id="tambah-barang" data-harga="25.000">
                {{-- <input type="checkbox" class="menu-checkbox" id="checkbox" data-subHarga="1.000"> --}}
                {{-- <input type="checkbox" class="checkbox1" data-harga="25.000"> --}}
              </label>
                <br>
            
              <p class="card-text"><small class="text-body-secondary">Rp.25.000</small></p>
            
            </div>
          </div>
        </div>
      </div>

    </div>
    {{-- end --}}

    {{-- card pembayaran --}}
    
    <div class="card-bayar">
      {{-- <form action="" method="post"> --}}
      <h4>Pesanan mu</h4>
      <div style="display: flex; justify-content: center;">
      <table id="keranjang" >
        <thead >
          <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>sub total</th>
            <th>item</th>
            
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
      <input type="submit" id="bayar" value="pesan" style="width:100%;padding:10px; border:0; border-radius:5px;">
    {{-- </form> --}}
    </div>

  

    {{-- end --}}

  </div>
  
  

  {{-- <h1>Angka: <span id="angka">1</span></h1>
  <button id="tambah">Tambah</button>
  <button id="kurang">Kurang</button> --}}
    
  <h1>Keranjang Belanja</h1>

  <div class="keranjang">
    <h2>Barang dalam Keranjang</h2>
    <!-- Daftar item dalam keranjang akan ditampilkan di sini -->
    <div id="daftar-keranjang">
    </div>
    <h3>Total Harga: $<span id="total">0</span></h3>
    <button id="checkout">Checkout</button>
    <button >Tambah Barang</button>
  </div>

  <script>
    // Inisialisasi keranjang belanja
    const keranjangBelanja = [];
    const daftarKeranjang = document.getElementById('daftar-keranjang');
    const totalSpan = document.getElementById('total');

    // Fungsi untuk menambah item ke keranjang belanja
    function tambahItem(nama, harga) {
      keranjangBelanja.push({ nama, harga, jumlah: 1 });
      updateKeranjangBelanja();
    }

    // Fungsi untuk memperbarui tampilan keranjang belanja
    function updateKeranjangBelanja() {
      daftarKeranjang.innerHTML = '';
      keranjangBelanja.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('item');
        itemDiv.innerHTML = `
          <span>${item.nama}</span>
          <span>Harga: $${item.harga}</span>
          <button class="kurang" data-index="${index}">-</button>
          <span class="jumlah">${item.jumlah}</span>
          <button class="tambah" data-index="${index}">+</button>
          <button class="hapus" data-index="${index}">Hapus</button>
        `;
        daftarKeranjang.appendChild(itemDiv);
      });
      updateTotalHarga();
    }

    // Fungsi untuk menghitung total harga
    function updateTotalHarga() {
      let totalHarga = 0;
      keranjangBelanja.forEach(item => {
        totalHarga += item.harga * item.jumlah;
      });
      totalSpan.textContent = totalHarga;
    }

    // Event listener untuk tombol "Checkout"
    const checkoutButton = document.getElementById('checkout');
    checkoutButton.addEventListener('click', function () {
      alert('Terima kasih telah berbelanja! Silakan lanjutkan ke proses pembayaran.');
    });

    // Event listener untuk tombol "Tambah Barang"
    const tambahBarangButton = document.getElementById('tambah-barang');
    tambahBarangButton.addEventListener('click', function () {
      // Anda bisa menambahkan barang sesuai kebutuhan di sini
      tambahItem(`Barang ${keranjangBelanja.length + 1+"jkj"}`, 10); // Contoh: Nama Barang dan Harga
    });

    // Event listener untuk tombol "Tambah" dan "Kurang"
    daftarKeranjang.addEventListener('click', function (event) {
      if (event.target.classList.contains('tambah')) {
        const index = event.target.getAttribute('data-index');
        keranjangBelanja[index].jumlah++;
        updateKeranjangBelanja();
      } else if (event.target.classList.contains('kurang')) {
        const index = event.target.getAttribute('data-index');
        if (keranjangBelanja[index].jumlah > 0) {
          keranjangBelanja[index].jumlah--;
          updateKeranjangBelanja();
        }
      } else if (event.target.classList.contains('hapus')) {
        const index = event.target.getAttribute('data-index');
        keranjangBelanja.splice(index, 1);
        updateKeranjangBelanja();
      }
    });

    // Memperbarui tampilan awal
    updateKeranjangBelanja();
  </script>
@endsection