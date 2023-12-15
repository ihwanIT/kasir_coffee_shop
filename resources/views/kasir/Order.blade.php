@extends('layout.mainKasir')
@section('title', 'Daftar Menu')
@php
    $daftarOrder = 'rgb(78, 78, 255)'; // Mengatur warna teks menjadi putih
@endphp
@section('daftar-Order')
    @if (session('success'))
        <div class="alert alert-success" style="margin: 10px; border:0; ">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif


    <div class="container-daftar-order">
        <div class="daftar-order">
            <div class="card" style="text-align: star; padding:10px; margin:10px 0px; border:0; border-radius:20px;">

                {{-- <div class="search-menu-order"> --}}

                <input type="search" class="search-menu-order" id="searchInput" placeholder="Cari..">
                {{-- </div> --}}

                <div class="pilih-menu">
                    <div class="card Minuman-btn" style="box-shadow: 0px 2px 5px gray; cursor:pointer;"
                        onclick="showMenu('Minuman')">Minuman</div>
                    <div class="card Makanan-btn" style="box-shadow: 0px 2px 5px gray; cursor:pointer;"
                        onclick="showMenu('Makanan')">Makanan</div>

                </div>
            </div>
            <div class="card-container">
                @foreach ($menus as $item_menu)
                    <div class="col menu-item {{ $item_menu->kategori }}" style="margin: 10px">
                        <div class="col">
                            <div class="card" style="width: 9rem;">
                                @if ($item_menu->image)
                                     <img src="{{ asset('storage/' . $item_menu->image ) }}" class="card-img-top" alt="gambar">
                                @else
                                <img src="assets/menu2.png" class="card-img-top" alt="gambar">
                                @endif
                                <div class="card-body">
                                    <b>{{ $item_menu->nama }}</b>
                                    <p class="card-text">@currency($item_menu->harga)</p>
                                    {{-- <p class="card-text">{{  }}</p> --}}
                                    <button class="addToCartBtn" data-id="{{ $item_menu->id }}"
                                        data-name="{{ $item_menu->nama }}" data-price="{{ $item_menu->harga }}"
                                        style="background-color: rgb(99, 99, 199); border:0; border-radius:5px; color:white;">Pilih</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        {{-- CHARD ORDER --}}
        <div class="cart">
            <form action="/DaftarOrderMenu" method="post">
                @csrf
                <h5>List Order</h5>
                <hr>
                <table class="table table-striped art-items">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Qte</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col"><i class="fa-solid fa-gear"></i></th>

                        </tr>
                    </thead>

                    <tbody class="cart-items">

                    </tbody>
                </table>
                <div class="card" style="padding: 10px; margin:10px 0px;   box-shadow: 0px 2px 5px gray;">
                    <p>Total Harga:
                        <br>
                        <b>
                            Rp.
                            <span class="total-price">0</span>
                    </p>
                    </b>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Note : </label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tulis note....." required></textarea>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button id="orderButton" class="btn" type="submit"
                        style="background-color: rgb(74, 155, 74); color:white; border-radius:20px;">Tambah Orderan</button>
                </div>

                <input type="hidden" id="menuInput" name="menu">
                <input type="hidden" id="jumlahInput" name="jumlah">
                <input type="hidden" id="subHargaInput" name="sub_harga">
                <input type="hidden" id="totalHargaInput" name="total_harga">
            </form>
        </div>

    </div>

    @if ($orderBaru)
    <div style="background-color: white; margin:10px 0px; padding:10px; border-radius:20px;">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Total</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{ $orderBaru->menu }}</td>
                <td>{{ $orderBaru->jumlah }}</td>
                <td>{{ $orderBaru->sub_harga }}</td>
                <td>@currency($orderBaru->total_harga)</td>
                <td>{{ $orderBaru->keterangan }}</td>
                <td>{{ $orderBaru->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="/transaksi" style="text-decoration: none; background:none;">
                        <button style="background-color: #5167ca; border:0; border-radius:20px; padding:10px 20px;">Selesaikan Orderan <i class="fa-solid fa-clipboard-check"></i> </button>
                    </a>
                </td>
                </tr>


            </tbody>
        </table>
    </div>
    @else  
    @endif

    {{-- ========================================== TOMBOL MINUMAN DAN MAKANAN --}}
    <script>
        function showMenu(category) {
            const menuItems = document.querySelectorAll('.menu-item');

            // Ambil tombol-tombol minuman dan makanan
            const minumanBtn = document.querySelector('.Minuman-btn');
            const makananBtn = document.querySelector('.Makanan-btn');

            // Loop melalui semua item menu
            menuItems.forEach(function(menuItem) {
                if (category === 'Minuman') {
                    // Tampilkan item menu dengan kategori 'minuman' dan sembunyikan yang lain
                    if (menuItem.classList.contains('Minuman')) {
                        menuItem.style.display = '';
                    } else {
                        menuItem.style.display = 'none';
                    }
                    // Ubah warna tombol sesuai dengan kategori yang dipilih
                    minumanBtn.style.backgroundColor = 'rgb(106, 106, 255)';
                    makananBtn.style.backgroundColor = 'initial';
                } else if (category === 'Makanan') {
                    // Tampilkan item menu dengan kategori 'makanan' dan sembunyikan yang lain
                    if (menuItem.classList.contains('Makanan')) {
                        menuItem.style.display = '';
                    } else {
                        menuItem.style.display = 'none';
                    }
                    // Ubah warna tombol sesuai dengan kategori yang dipilih
                    makananBtn.style.backgroundColor = 'rgb(106, 106, 255)';
                    minumanBtn.style.backgroundColor = 'initial';
                }
            });
        }

        // Saat halaman dimuat, tampilkan default menu minuman
        showMenu('Minuman');
    </script>
    <script>
        // {{-- ================================= JS SEARCH MENU ORDERAN --}}
        // Ambil elemen input dan kartu-kartu
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.card-container .col');

        // Tambahkan event listener untuk input
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase(); // Ambil teks pencarian dan ubah ke huruf kecil

            // Loop melalui setiap kartu
            cards.forEach(function(card) {
                const cardName = card.querySelector('b').textContent
                    .toLowerCase(); // Ambil nama menu dari setiap kartu dan ubah ke huruf kecil

                // Periksa apakah nama menu cocok dengan teks pencarian
                if (cardName.includes(searchTerm)) {
                    card.style.display = ''; // Tampilkan kartu jika cocok dengan kriteria pencarian
                } else {
                    card.style.display = 'none'; // Sembunyikan kartu jika tidak cocok
                }
            });
        });


        // ---------------------------------------------
        const cart = [];
        const cartTable = document.querySelector('.cart-items');
        const totalPriceElement = document.querySelector('.total-price');

        document.querySelectorAll('.addToCartBtn').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                const itemName = this.getAttribute('data-name');
                const itemPrice = parseFloat(this.getAttribute('data-price'));

                addToCart(itemId, itemName, itemPrice);
            });
        });

        function addToCart(itemId, itemName, itemPrice) {
            const existingItem = cart.find(item => item.id === itemId);

            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    id: itemId,
                    name: itemName,
                    price: itemPrice,
                    quantity: 1
                });
            }

            renderCart();
        }

        // funsi untuk menyimpan data ke dalam database
        function renderCart() {
            cartTable.innerHTML = '';

            cart.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td name="menu">${item.name}</td>
            <td>
                <i class="fa-solid fa-circle-plus increment" data-id="${item.id}"></i>
                <span name="jumlah">${item.quantity}</span>
                <i class="fa-solid fa-circle-minus decrement" data-id="${item.id}"></i>
            </td>
            <td class="item-price" name="sub_harga" >Rp. ${(item.price * item.quantity).toFixed(2)}</td>
            <td><i class="fa-solid fa-trash remove-item" data-id="${item.id}"></i></td>
            
        `;
                cartTable.appendChild(row);
            });

            let menuInputValue = '';
            let jumlahInputValue = '';
            let subHargaInputValue = '';
            let totalHargaInputValue = 0;

            if (cart.length > 1) {
                cart.forEach((item, index) => {
                    // ... kode lainnya ...

                    // Menambahkan nilai ke input tersembunyi
                    if (index !== cart.length - 1) {
                        menuInputValue += item.name + '-';
                        jumlahInputValue += item.quantity + '-';
                        subHargaInputValue += (item.price * item.quantity).toFixed(2) + '-';
                    } else {
                        menuInputValue += item.name;
                        jumlahInputValue += item.quantity;
                        subHargaInputValue += (item.price * item.quantity).toFixed(2);
                    }

                    totalHargaInputValue += item.price * item.quantity;
                });
            } else if (cart.length === 1) {
                const singleItem = cart[0];
                menuInputValue = singleItem.name;
                jumlahInputValue = singleItem.quantity.toString();
                subHargaInputValue = (singleItem.price * singleItem.quantity).toFixed(2);
                totalHargaInputValue = singleItem.price * singleItem.quantity;
            }

            // Memperbarui nilai dari input tersembunyi
            document.getElementById('menuInput').value = menuInputValue;
            document.getElementById('jumlahInput').value = jumlahInputValue;
            document.getElementById('subHargaInput').value = subHargaInputValue;
            document.getElementById('totalHargaInput').value = totalHargaInputValue;
            // end
            updateTotalPrice();
        }


        // Event listener untuk menghapus item dari keranjang belanja
        document.querySelector('.cart').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                const itemId = event.target.getAttribute('data-id');
                const itemIndex = cart.findIndex(item => item.id === itemId);
                if (itemIndex !== -1) {
                    cart.splice(itemIndex, 1);
                    renderCart();
                }
            }
        });

        // Function to update total price
        function updateTotalPrice() {
            let totalPrice = 0;
            cart.forEach(item => {
                totalPrice += item.price * item.quantity;
            });
            totalPriceElement.textContent = totalPrice.toFixed(2);
        }

        // Event delegation for 'increment' and 'decrement' buttons
        document.querySelector('.cart').addEventListener('click', function(event) {
            if (event.target.classList.contains('increment')) {
                const itemId = event.target.getAttribute('data-id');
                const item = cart.find(item => item.id === itemId);
                if (item) {
                    item.quantity++;
                    renderCart();
                }
            }

            if (event.target.classList.contains('decrement')) {
                const itemId = event.target.getAttribute('data-id');
                const item = cart.find(item => item.id === itemId);
                if (item && item.quantity > 1) {
                    item.quantity--;
                    renderCart();
                }
            }
        });
        //   ================================ masuk ke database
    </script>


@endsection
