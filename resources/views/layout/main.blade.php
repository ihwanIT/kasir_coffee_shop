<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/menu.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <style>
    .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Menempatkan navbar di atas konten lain */
  }
  .navbar a{
    color: white;
  }
  @media screen and (max-width: 600px) {
    .navbar{
      background-color: white;
    }
    .navbar a{
    color: black;
  }
  }
  </style>
  <body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Coffee Shop</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Makanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Minuman</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-4" type="search" placeholder="Makanan/Minuman" aria-label="Search">
              <button class="btn" type="submit" style="border: 1px solid white; color:white;">Cari</button>
            </form>
          </div>
        </div>
      </nav>
    {{-- end --}}
    {{-- menu --}}
    @yield('menu')
    {{-- end --}}

    {{-- footer --}}
    <footer>
        <h2>COFFEE SHOP</h2>
        <div class="footer-content">
            <div class="text"><h4>About</h4>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            </div>
            <div class="text"><h4>get now</h4>
                <a href=""><p>Makanan</p></a>
               <a href=""><p>minuman</p></a>
               <a href=""><p>coffee</p></a>
               
            </div>
            <div class="text"><h4>Contant</h4>
                jl.janti, no 12 umbulharjo banguntapan bantul DIY, ID.
                <br>
                0812345678
            </div>
        </div>
        <div class="icon-sosmed">
            <a href="">
                <img src="assets/icon/facebook.png" alt="">
            </a>
            <a href="">
                <img src="assets/icon/instagram.png" alt="">
            </a>
            <a href="">
                <img src="assets/icon/tiktok.png" alt="">
            </a>
            <a href="">
                <img src="assets/icon/whatsapp.png" alt="">
            </a>
            <a href="">
                <img src="assets/icon/youtube.png" alt="">
            </a>
            
        </div>
    </footer>

    {{-- end --}}
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>