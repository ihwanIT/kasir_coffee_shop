<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
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

        .dashboard {
            background-color: {{ $textColor ?? 'black' }};
        }

        .order {
            background-color: {{ $order ?? 'black' }};
        }

        .menu {
            background-color: {{ $menukopi ?? 'black' }};
        }

        .has-submenu {
            background-color: {{ $daftarOrder ?? 'black' }};
        }

        .persediaan {
            background-color: {{ $persediaan ?? 'black' }};
        }

        .transaksi {
            background-color: {{ $transaksi ?? 'black' }};
        }

        .admin {
            background-color: {{ $admin ?? 'black' }};
        }

        .laporan {
            background-color: {{ $laporan ?? 'black' }};
            border-radius: {{ $border1 ?? '' }};
        }
    </style>
    <link href="dashboard.css" rel="stylesheet">
</head>

<body style="background-color: rgb(229, 229, 229)">
    {{-- <body style="background-color: grey"> --}}
    {{-- <header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow" style="background-color: white;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4 fs-10" href="{{ route('kasir.dashboard') }}">Coffee Shop</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out  
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                </a>
            </div>
        </div>
    </header> --}}
    {{-- <header><h3>Dashboard</h3></header> --}}

    <div class="container-fluid">
        <div class="row">
            {{-- menu --}}
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse"
                style="background-color: black; border-radius:0px 20px 20px 0px;">
                <div class="position-sticky pt-0 sidebar-sticky">
                    <div class="logo"><img style="height: 120px; width:120px;" src="assets/icon/logo kedai kopi.png"
                            alt="orders"></div>
                    <ul class="nav flex-column">
                        <li class="nav-item dashboard">
                            <a class="nav-link" aria-current="page" href="{{ route('kasir.dashboard') }}">
                                <span class="apa" data-feather="home" class="align-text-bottom"><img
                                        src="assets/icon/home5.png" alt="dashboard"></span>

                                <span style="color: white;">Dashboard</span>
                            </a>
                        </li>

                        <li class="has-submenu">
                            <a class="nav-link">
                                <span data-feather="users" class="align-text-bottom"><img
                                        src="assets/icon/transaction5.png" alt="user"></span>

                                <span id="transaction-icon" style="color: white; cursor: pointer;">Kasir<i
                                        class="fa-solid fa-angle-down" style="margin-left: 20px;"></i></span>

                            </a>
                            <ul class="submenu">
                                <li nav-item>
                                    <a class="nav-link" href="{{ route('kasir.Order') }}">

                                        <span style="color: white;" class="koko">Order dulu
                                        </span>
                                    </a>
                                </li>
                                <li nav-item>
                                    <a class="nav-link" href="{{ route('kasir.transaksi') }}">

                                        <span style="color: white;" class="koko">Transaksi
                                        </span>
                                    </a>
                                </li>
                                <li nav-item>
                                    <a class="nav-link" href="{{ route('kasir.transaksiSelesai') }}">

                                        <span style="color: white;" class="koko">Penjualan
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item menu">
                            <a class="nav-link" href="/MenuProduk">
                                <span data-feather="shopping-cart" class="align-text-bottom"><img
                                        src="assets/icon/menu.png" alt="menu"></span>

                                <span style="color: white;">Menu</span>
                            </a>
                        </li>
                        <li class="nav-item persediaan">
                            <a class="nav-link" href="/persediaan">
                                <span data-feather="shopping-cart" class="align-text-bottom"><img
                                        src="assets/icon/product2.png" alt="menu"></span>

                                <span style="color: white;">Persediaan</span>
                            </a>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span style="color: white;">Laporan</span>
                    </h6>
                    <ul class="nav flex-column mb-2">

                        <li class="nav-item admin">
                            <a class="nav-link" href="/admin">
                                <span data-feather="file-text" class="align-text-bottom"><img
                                        src="assets/icon/admin.png" alt="dashboard"></span>
                                <span style="color: white;">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item laporan">
                            <a class="nav-link" href="{{ route('kasir.laporan') }}">
                                <span data-feather="file-text" class="align-text-bottom"><img
                                        src="assets/icon/report.png" alt="dashboard"></span>

                                <span style="color: white;">Laporan</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item laporan" >
                            <a class="nav-link" href="{{ route('kasir.laporan') }}" >
                                <span data-feather="file-text" class="align-text-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                                    </span>
                                
                                <span style="color: white;" >Sign Out</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
            {{-- end menu --}}

            {{-- data --}}

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">
                <div style="background-color: rgb(78, 78, 255); margin:0px; color:white; padding:10px; border-radius:0px 0px 20px 20px; display:flex;   justify-content:space-between;">
                    <h5>@yield('title')</h5>
                    @auth
                        <li class="nav-item dropdown" style="background-color: rgb(69, 182, 136); padding:5px 10px;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->username }}
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Photo"
                                    style="height: 30px; width:30px; border-radius:50%;">

                            </a>
                            <ul class="dropdown-menu" style="font-size: 14px;">
                                <li><a class="dropdown-item" href="{{ route('kasir.dashboard') }}"><i class="fa-solid fa-dice"></i> Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-user"></i> Edit Profil</a></li>
                                <li>

                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i
                                                class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                                    </form>
                            </ul>
                        </li>

                    @endauth

                </div>

                {{-- dashboard --}}
                @yield('dashboard')
                {{-- end --}}
                {{-- orders --}}
                @yield('orders')
                {{-- end --}}
                {{-- daftar-Order --}}
                @yield('daftar-Order')
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
        // rotasi icon angle
        document.getElementById("transaction-icon").addEventListener("click", function() {
            var icon = this.querySelector("i.fa-angle-down");
            if (icon.classList.contains("rotate")) {
                icon.classList.remove("rotate");
            } else {
                icon.classList.add("rotate");
            }
        });
        // triger submenu transaksi
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

        {{-- EDIT TRIGER --}}

        // edit stok
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.btnEditStok');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var stok_id = this.getAttribute('data-stok_id');
                    var bahan_baku = this.getAttribute('data-bahan_baku');
                    var jumlah_stok = this.getAttribute('data-jumlah_stok');
                    var satuan_pengukuran = this.getAttribute('data-satuan_pengukuran');
                    var jumlah_cup = this.getAttribute('data-jumlah_cup');
                    var supplier = this.getAttribute('data-supplier');
                    var harga_beli = this.getAttribute('data-harga_beli');
                    var keterangan = this.getAttribute('data-keterangan');

                    // modal edit stok
                    var modalEdit = document.getElementById('editStok');
                    modalEdit.querySelector('#stok_id').value = stok_id;
                    modalEdit.querySelector('#bahan_baku').value = bahan_baku;
                    modalEdit.querySelector('#jumlah_stok').value = jumlah_stok;
                    modalEdit.querySelector('#satuan_pengukuran').value = satuan_pengukuran;
                    modalEdit.querySelector('#jumlah_cup').value = jumlah_cup;
                    modalEdit.querySelector('#supplier').value = supplier;
                    modalEdit.querySelector('#harga_beli').value = harga_beli;
                    modalEdit.querySelector('#keterangan').value = keterangan;

                    // modal hapus stok
                    var modalHapus = document.getElementById('hapusStok');
                    modalHapus.querySelector('#stok_id').value = stok_id;
                    modalHapus.querySelector('#bahan_baku').value = bahan_baku;
                    modalHapus.querySelector('#jumlah_stok').value = jumlah_stok;
                    modalHapus.querySelector('#satuan_pengukuran').value = satuan_pengukuran;
                    modalHapus.querySelector('#jumlah_cup').value = jumlah_cup;
                    modalHapus.querySelector('#supplier').value = supplier;
                    modalHapus.querySelector('#harga_beli').value = harga_beli;
                    modalHapus.querySelector('#keterangan').value = keterangan;
                });
            });
        });

        // edit menu
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.btn-edit');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-myid');
                    var nama = this.getAttribute('data-myname');
                    var kategori = this.getAttribute('data-mykategori');
                    var harga = this.getAttribute('data-myharga');
                    var jumlah = this.getAttribute('data-myjumlah');

                    // modal edit menu
                    var modalEdit = document.getElementById('edit');
                    modalEdit.querySelector('#id_menu').value = id;
                    modalEdit.querySelector('#nama').value = nama;
                    modalEdit.querySelector('#kategori').value = kategori;
                    modalEdit.querySelector('#harga').value = harga;
                    modalEdit.querySelector('#jumlah').value = jumlah;

                    // modal hapus menu
                    var modalHapus = document.getElementById('hapus');
                    modalHapus.querySelector('#id_menu').value = id;
                    modalHapus.querySelector('#nama').value = nama;
                    modalHapus.querySelector('#kategori').value = kategori;
                    modalHapus.querySelector('#harga').value = harga;
                    modalHapus.querySelector('#jumlah').value = jumlah;
                });
            });
        });

        // edit admin
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.btnEditAdmin');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var nama = this.getAttribute('data-nama');
                    var email = this.getAttribute('data-email');
                    var username = this.getAttribute('data-username');
                    var password = this.getAttribute('data-password');

                    // modal edit admin
                    var modalEdit = document.getElementById('editAdmin');
                    modalEdit.querySelector('#id_admin').value = id;
                    modalEdit.querySelector('#nama').value = nama;
                    modalEdit.querySelector('#email').value = email;
                    modalEdit.querySelector('#username').value = username;
                    modalEdit.querySelector('#password').value = password;

                    // modal hapus admin
                    var modalHapus = document.getElementById('hapusAdmin');
                    modalHapus.querySelector('#id_admin').value = id;
                    modalHapus.querySelector('#nama').value = nama;
                    modalHapus.querySelector('#email').value = email;
                    modalHapus.querySelector('#username').value = username;
                    modalHapus.querySelector('#password').value = password;
                });
            });
        });

        function displaySelectedValuesEdit() {
            var dropdown = document.getElementById("nama_orderan");
            var selectedOption = dropdown.options[dropdown.selectedIndex].value;

            var values = selectedOption.split(",");
            var displayDivHarga = document.getElementById("selectedValuesHargaEdit");
            var displayDiv = document.getElementById("selectedValuesHargaEditHarga");
            var jumlah = parseInt(document.getElementById("jumlah").value);

            displayDivHarga.value = values[0];
            displayDiv.value = values[1];

            // var hargaPerUnit = parseInt(displayDivHarga.value);
            var hargaPerUnit = parseInt(displayDiv.value);
            hargaPerUnit = isNaN(hargaPerUnit) ? 0 : hargaPerUnit;

            var totalHargaJual = hargaPerUnit * jumlah;
            document.getElementById("total_harga_jualEdit").value = totalHargaJual;
        }

        function displaySelectedValuess() {
            var dropdown = document.getElementById("myDropdowns");
            var selectedOption = dropdown.options[dropdown.selectedIndex].value;

            var values = selectedOption.split(",");
            var displayDivHarga = document.getElementById("selectedValuesHarga");
            var displayDiv = document.getElementById("selectedValuess");
            var jumlah = parseInt(document.getElementById("jumlah_total_pembelian_menu").value);

            displayDivHarga.value = values[0];
            displayDiv.value = values[1];

            // var hargaPerUnit = parseInt(displayDivHarga.value);
            var hargaPerUnit = parseInt(displayDiv.value);
            hargaPerUnit = isNaN(hargaPerUnit) ? 0 : hargaPerUnit;

            var totalHargaJual = hargaPerUnit * jumlah;
            document.getElementById("total_harga_jual").value = totalHargaJual;
        }

        function calculatePrice() {
            let checkboxes = document.querySelectorAll('input[name="barang[]"]:checked');
            let totalHarga = 0;

            checkboxes.forEach(function(checkbox) {
                let harga = checkbox.nextElementSibling.textContent.split(' - Rp ')[1];
                totalHarga += parseFloat(harga);
            });

            let jumlah = parseFloat(document.getElementById('jumlah').value);
            let hargaPerItem = totalHarga / jumlah;

            document.getElementById('harga').value = hargaPerItem.toFixed(2);
            document.getElementById('total').value = totalHarga.toFixed(2);

        }

        // =============================== ADD TO SHOPING CARD



        // ---------------------------
    </script>

</body>

</html>
