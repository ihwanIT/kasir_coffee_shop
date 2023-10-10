// NAVBAR UBAH WARNA
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
    if (window.scrollY > 500) {
        navbar.style.backgroundColor = "gray"; // Ganti warna navbar saat scrolling
    } else {
        navbar.style.backgroundColor = "transparent"; // Kembalikan warna ke semitransparan
    }
});
// END

// ITEM MENU YANG DIMASUKAN DI KERANJANG
const menuCheckboxes = document.querySelectorAll('.menu-checkbox');
const bayarButton = document.getElementById('bayar'); // Ganti dengan ID tombol bayar Anda

menuCheckboxes.forEach(checkbox => {
  checkbox.addEventListener('change', function () {
    const currentCheckbox = this; // Simpan elemen checkbox yang sedang diamati dalam variabel

    if (currentCheckbox.checked) {
      bayarButton.style.backgroundColor = "#27ae60";
      bayarButton.style.cursor = "pointer";
      bayarButton.disabled = false;

      const itemName = currentCheckbox.parentElement.textContent.trim();
      const itemPrice = parseFloat(currentCheckbox.dataset.harga);
      const itemSubPrice = itemPrice*2;
      const itemTambah = "<button id='tambah'>+</button> <span id='angka'>1</span> <button id='kurang'>-</button>";
      // <button id='tambah'>Tambah</button>;
      // <button id='kurang'>Kurang</button>;
      addItemToCart(itemName, itemPrice, itemSubPrice, itemTambah);

    } else {
      bayarButton.style.backgroundColor = "#ccc";
      bayarButton.style.cursor = "not-allowed";
      bayarButton.disabled = true;

      removeItemFromCart(currentCheckbox.parentElement.textContent.trim());
    }
  });
});
// END

// FUNGSI BUAT TABLE CARD KERANJANG
function addItemToCart(name, price, subHarga, tambahItme) {
  const cartTable = document.getElementById('keranjang');
  const tbody = cartTable.querySelector('tbody');
  const newRow = document.createElement('tr');
  newRow.innerHTML = `<td>${name}</td><td>${price}</td><td>${subHarga}</td><td>${tambahItme}</td>`;
  tbody.appendChild(newRow);
}

function removeItemFromCart(name) {
  const cartTable = document.getElementById('keranjang');
  const tbody = cartTable.querySelector('tbody');
  const rows = tbody.getElementsByTagName('tr');
  
  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const itemName = row.cells[0].textContent;
    
    if (itemName === name) {
      tbody.removeChild(row);
      break; // Hentikan pencarian setelah item ditemukan dan dihapus
    }
  }
}
// END

// TAMBAH ITEM PEMBELIAN
const angkaSpan = document.getElementById('angka');
const tambahButton = document.getElementById('tambah');
const kurangButton = document.getElementById('kurang');

let angka = 1;

tambahButton.addEventListener('click', function () {
  angka++;
  updateAngka();
});

kurangButton.addEventListener('click', function () {
  if (angka > 1) {
    angka--;
    updateAngka();
  }
});

function updateAngka() {
  angkaSpan.textContent = angka;
}
// END




