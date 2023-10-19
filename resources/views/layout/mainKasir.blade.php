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
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            {{-- menu --}}
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <br>
                    <br>
                    <br>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('kasir.dashboard') }}">
                                <span data-feather="home" class="align-text-bottom"><img src="assets/icon/dashboard.png"
                                        alt="dashboard"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kasir.orders') }}">
                                <span data-feather="file" class="align-text-bottom"><img src="assets/icon/orders.png"
                                        alt="orders"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kasir.menuProduk') }}">
                                <span data-feather="shopping-cart" class="align-text-bottom"><img
                                        src="assets/icon/menu.png" alt="menu"></span>
                                Menu
                            </a>
                        </li>

                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span>Laporan</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kasir.karyawanCaffee') }}">
                                <span data-feather="users" class="align-text-bottom"><img src="assets/icon/user.png"
                                        alt="user"></span>
                                Karyawan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kasir.laporan') }}">
                                <span data-feather="file-text" class="align-text-bottom"><img
                                        src="assets/icon/pelaporan.png" alt="dashboard"></span>
                                Laporan Keuangan & Penjualan
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
</body>

</html>
