<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="css/dashboard.css" rel="stylesheet">

    <style>
        /* .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      } */

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        .dashboard{
            background-color:{{ $textColor ?? 'black' }};
        }
        .order{
            background-color:{{ $order ?? 'black' }};
        }
        .menu{
            background-color:{{ $menukopi ?? 'black' }};
        }
        .persediaan{
            background-color:{{ $persediaan ?? 'black' }};
        }
        .transaksi{
            background-color:{{ $transaksi ?? 'black' }};
        }
        .admin{
            background-color:{{ $admin ?? 'black' }};
        }
        .laporan{
            background-color:{{ $laporan ?? 'black' }};
            border-radius:{{ $border1 ?? '' }};
        }
    </style>
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4 fs-10" href="{{ route('kasir.dashboard') }}">Coffee Shop</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>
    {{-- <header><h3>Dashboard</h3></header> --}}

    <div class="container-fluid">
        <div class="row">
            {{-- menu --}}
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: black">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <br>
                    <br>
                    <br>
                    <ul class="nav flex-column">
                        <li class="nav-item dashboard">
                            <a class="nav-link" aria-current="page" href="{{ route('kasir.dashboard') }}">
                                <span class="apa" data-feather="home" class="align-text-bottom"><img src="assets/icon/home5.png"
                                        alt="dashboard"></span>
                                
                                <span style="color: white;">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item order">
                            <a class="nav-link" href="/orders">
                                <span data-feather="file" class="align-text-bottom"><img src="assets/icon/order5.png"
                                        alt="orders"></span>
                                
                                <span style="color: white;">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item menu">
                            <a class="nav-link" href="/MenuProduk">
                                <span data-feather="shopping-cart" class="align-text-bottom"><img
                                        src="assets/icon/menu.png" alt="menu"></span>
                                
                                <span style="color: white;">Menu</span>
                            </a>
                        </li>
                        <li class="nav-item persediaan">
                            <a class="nav-link" href="{{ route('kasir.persediaan') }}">
                                <span data-feather="shopping-cart" class="align-text-bottom"><img
                                        src="assets/icon/product2.png" alt="menu"></span>
                                
                                <span style="color: white;">Persediaan</span>
                            </a>
                        </li>
                        <li class="has-submenu">
                            <a class="nav-link">
                                <span data-feather="users" class="align-text-bottom"><img src="assets/icon/transaction5.png"
                                        alt="user"></span>
                                
                                <span style="color: white;">Transaksi
                                    
                                        {{-- <div class="kotak">kotak</div> --}}
                                  
                                </span>
                            </a>
                        <ul class="submenu">
                            <li nav-item>
                            <a class="nav-link" href="{{ route('kasir.transaksi') }}">
                                
                                <span style="color: white;" class="koko">Penjualan
                                </span>
                            </a>
                        </li>
                            <li nav-item>
                            <a class="nav-link" href="{{ route('kasir.admin') }}">
                                
                                <span style="color: white;" class="koko">Banyak Dibeli
                                </span>
                            </a>
                        </li>
                            <li nav-item>
                            <a class="nav-link" href="{{ route('kasir.admin') }}">
                                <span style="color: white;" class="koko">Pendapatan
                                </span>
                            </a>
                        </li>
                        </ul>
                    </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span style="color: white;">Laporan</span>
                    </h6>
                    <ul class="nav flex-column mb-2">

                        <li class="nav-item admin">
                            <a class="nav-link" href="{{ route('kasir.admin') }}">
                                <span data-feather="file-text" class="align-text-bottom"><img
                                        src="assets/icon/admin.png" alt="dashboard"></span>
                                <span style="color: white;">Admin</span> 
                            </a>
                        </li>
                        <li class="nav-item laporan">
                            <a class="nav-link" href="{{ route('kasir.laporan') }}">
                                <span data-feather="file-text" class="align-text-bottom"><img
                                        src="assets/icon/report.png" alt="dashboard"></span>
                                
                                <span style="color: white;">Laporan Keuangan & Penjualan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- end menu --}}

            {{-- data --}}

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">

                {{-- dashboard --}}
                @yield('dashboard')
                {{-- end --}}
                {{-- orders --}}
                @yield('orders')
                {{-- end --}}
                {{-- menuProduk --}}
                @yield('menuProduk')
                {{-- end --}}
                {{-- karyawan --}}
                @yield('karyawan')
                {{-- end --}}
                {{-- persediaan --}}
                @yield('persediaan')
                {{-- end --}}
                {{-- penjualan --}}
                @yield('penjualan')
                {{-- end --}}
                {{-- admin --}}
                @yield('admin')
                {{-- end --}}
                {{-- laporan --}}
                @yield('laporan')
                {{-- end --}}



            </main>

            {{-- end data --}}

        </div>
    </div>


    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
        integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
  const submenuItems = document.querySelectorAll('.has-submenu');

  submenuItems.forEach(item => {
    const submenu = item.querySelector('.submenu');

    // Buka/tutup submenu saat item utama diklik
    item.addEventListener('click', function(event) {
      event.preventDefault();
      if (submenu.style.display === 'block') {
        submenu.style.display = 'none';
      } else {
        submenu.style.display = 'block';
      }
    });

    // Mencegah penutupan submenu saat item submenu diklik
    const submenuLinks = submenu.querySelectorAll('a');
    submenuLinks.forEach(link => {
      link.addEventListener('click', function(event) {
        event.stopPropagation();
        // Hapus tanda komentar pada baris berikut jika ingin menutup submenu setelah mengklik item submenu
        //submenu.style.display = 'none';
      });
    });
  });
});

// triger update data menu modal boostraph
  </script>

      {{-- script triger edit data menu --}}
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.btn-edit');
            
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-myid');
                    var nama = this.getAttribute('data-myname');
                    var kategori = this.getAttribute('data-mykategori');
                    var harga = this.getAttribute('data-myharga');
    
                    // modal edit menu
                    var modalEdit = document.getElementById('edit');
                    modalEdit.querySelector('#id_menu').value = id;
                    modalEdit.querySelector('#nama').value = nama;
                    modalEdit.querySelector('#kategori').value = kategori;
                    modalEdit.querySelector('#harga').value = harga;

                    // modal hapus menu
                    var modalHapus = document.getElementById('hapus');
                    modalHapus.querySelector('#id_menu').value = id;
                    modalHapus.querySelector('#nama').value = nama;
                    modalHapus.querySelector('#kategori').value = kategori;
                    modalHapus.querySelector('#harga').value = harga;
                });
            });
        });
    </script>
    {{-- end triger edit data menu --}}

</body>

</html>
