// Mengambil elemen menu dan konten
const menuItems = document.querySelectorAll(".menu-item");
const menuContents = document.querySelectorAll(".menu-content");
const welcomeMessage = document.getElementById("welcome-message");

// Menambahkan event listener untuk setiap item menu
menuItems.forEach((item) => {
  item.addEventListener("mouseover", () => {
    item.classList.add("hover");
  });
  item.addEventListener("mouseout", () => {
    item.classList.remove("hover");
  });
  item.addEventListener("click", () => {
    // Menghapus kelas 'active' dari semua menu item
    menuItems.forEach((i) => i.classList.remove("active"));
    // Menambahkan kelas 'active' pada item yang diklik
    item.classList.add("active");

    // Menyembunyikan semua konten menu
    menuContents.forEach((content) => (content.style.display = "none"));

    // Menampilkan konten yang sesuai dengan id item yang diklik
    const id = item.id + "-content";
    document.getElementById(id).style.display = "block";

    // Mengubah pesan selamat datang sesuai dengan menu yang dipilih
    if (welcomeMessage) {
      welcomeMessage.innerText = `Selamat Datang di Menu ${item.innerText}`;
    }

    // Mengubah judul header sesuai menu yang dipilih
    document.getElementById(
      "menu-title"
    ).innerText = ` ${item.innerText.toUpperCase()}`; // Mengubah judul header
  });
});

// Fungsi untuk menampilkan pop-up

function displayCart() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const cartTableBody = document.querySelector("#cart-table tbody");
  cartTableBody.innerHTML = ""; // Kosongkan tabel sebelum diupdate

  cart.forEach((item) => {
    const newRow = cartTableBody.insertRow();
    newRow.innerHTML = `
            <td>${item.name}</td>
            <td>${item.selectedOption ? item.selectedOption.toUpperCase() : "N/A"
      }</td> <!-- Menampilkan pilihan jika ada -->
            <td>${item.price}</td>
            <td>${item.quantity}</td>
        `;
  });
}

document.addEventListener("DOMContentLoaded", function () {
  // Ambil menu dari localStorage
  const menuMinuman = JSON.parse(localStorage.getItem("menuMinuman")) || [];
  const menuMakanan = JSON.parse(localStorage.getItem("menuMakanan")) || [];
  const menuSeafood = JSON.parse(localStorage.getItem("menuSeafood")) || [];
  const menuSharing = JSON.parse(localStorage.getItem("menuSharing")) || [];
  const menuSnack = JSON.parse(localStorage.getItem("menuSnack")) || [];

  // Fungsi untuk menampilkan menu di kategori yang sesuai
  function updateTable(category, menuItems) {
    const tableBody = document.querySelector(`#${category}-content tbody`);
    tableBody.innerHTML = ""; // Kosongkan tabel sebelum diupdate

    menuItems.forEach((menu) => {
      const newRow = tableBody.insertRow();
      let menuHtml = "";

      if (category === "minuman") {
        // Menyimpan harga dalam variabel, jika tidak tersedia set ke 0
        let hargaHot = (menu.hargaHot !== undefined && menu.hargaHot !== null && menu.hargaHot !== 0) ? menu.hargaHot : 0;
        let hargaIce = (menu.hargaIce !== undefined && menu.hargaIce !== null && menu.hargaIce !== 0) ? menu.hargaIce : 0;

        menuHtml = `
                <td>
                    ${menu.nama}<br>
                    <span style="font-size: 10px; font-style: italic; font-weight: bold; max-height: 80px; overflow: hidden; word-wrap: break-word; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 5;">
                        Komposisi: ${menu.komposisi}
                    </span>
                </td>
                <td>
                    <div>
                        <span style="display: block;">${hargaHot > 0 ? "Rp " + hargaHot : "Rp 0"}</span>
                        <span style="display: block;">${hargaIce > 0 ? "Rp " + hargaIce : "Rp 0"}</span>
                    </div>
                </td>
                <td>
                    <input type="radio" name="${menu.nama.replace(/\s/g, "_")}" value="hot"> Hot<br>
                    <input type="radio" name="${menu.nama.replace(/\s/g, "_")}" value="ice"> Ice
                </td>
                <td>
                    <div class="checkbox-container">
                        <input type="checkbox" class="custom-checkbox checkbox-tambah">
                    </div>
                </td>
                <td>
                    <div class="input-container">
                        <i class="fas fa-minus icon-minus"></i>
                        <input type="number" min="1" value="1" class="input-jumlah"> <!-- Input untuk jumlah -->
                        <i class="fas fa-plus icon-plus"></i>
                    </div>
                </td>
            `;
      } else {
        menuHtml = `
                <td>
                    ${menu.nama}<br>
                    <span style="font-size: 10px; font-style: italic; font-weight: bold; max-height: 80px; overflow: hidden; word-wrap: break-word; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 5;">
                        Komposisi: ${menu.komposisi}
                    </span>
                </td>
                <td>Rp ${menu.harga}</td>
                <td>
                    <div class="checkbox-container">
                        <input type="checkbox" class="custom-checkbox checkbox-tambah">
                    </div>
                </td>
                <td>
                    <div class="input-container">
                        <i class="fas fa-minus icon-minus"></i>
                        <input type="number" min="1" value="1" class="input-jumlah"> <!-- Input untuk jumlah -->
                        <i class="fas fa-plus icon-plus"></i>
                    </div>
                </td>
            `;
      }

      newRow.innerHTML = menuHtml; // Tambahkan HTML baru ke baris tabel
      tableBody.appendChild(newRow); // Tambahkan baris baru ke tabel

      // Menambahkan event listener untuk ikon minus
      newRow.querySelector(".icon-minus").addEventListener("click", () => {
        const inputJumlah = newRow.querySelector(".input-jumlah");
        let currentValue = parseInt(inputJumlah.value);
        if (currentValue > 1) {
          inputJumlah.value = currentValue - 1; // Kurangi nilai input
        }
      });

      // Menambahkan event listener untuk ikon plus
      newRow.querySelector(".icon-plus").addEventListener("click", () => {
        const inputJumlah = newRow.querySelector(".input-jumlah");
        let currentValue = parseInt(inputJumlah.value);
        inputJumlah.value = currentValue + 1; // Tambahkan nilai input
      });
    });
  }

  // Update tabel untuk setiap kategori
  updateTable("minuman", menuMinuman);
  updateTable("makanan", menuMakanan);
  updateTable("seafood", menuSeafood);
  updateTable("sharing-menu", menuSharing);
  updateTable("snack", menuSnack);
});
//pop-up
// Menangani tombol pesan
document.querySelectorAll(".btn-pesan").forEach((button) => {
  button.addEventListener("click", () => {
    // Mengambil elemen untuk ringkasan pesanan
    const orderSummary = document.getElementById("order-summary");
    const totalPriceElement = document.getElementById("total-price");
    orderSummary.innerHTML = ""; // Kosongkan ringkasan pesanan sebelumnya
    let totalPrice = 0;
    let hasError = false; // Flag untuk mengecek apakah ada error

    // Ambil semua kategori menu
    const categories = [
      "minuman",
      "makanan",
      "seafood",
      "sharing-menu",
      "snack",
    ];

    categories.forEach((category) => {
      const menuItems = document.querySelectorAll(`#${category}-content tr`); // Ambil semua baris menu di kategori ini
      menuItems.forEach((item) => {
        const checkbox = item.querySelector(".checkbox-tambah");
        if (checkbox && checkbox.checked) {
          // Ambil nama menu dari sel dan pisahkan dari komposisi
          const menuCell = item.cells[0].innerText; // Ambil isi sel pertama
          const menuName = menuCell.split("Komposisi:")[0].trim(); // Ambil nama sebelum kata 'Komposisi'

          const quantityInput = item.querySelector(".input-jumlah");
          const quantity = parseInt(quantityInput.value); // Jumlah pesanan
          let type = ""; // Variabel untuk menyimpan jenis pesanan
          let itemPrice = 0; // Inisialisasi harga item

          // Jika kategori minuman, ambil jenis
          if (category === "minuman") {
            const hotRadio = item.querySelector('input[type="radio"][value="hot"]');
            const iceRadio = item.querySelector('input[type="radio"][value="ice"]');

            // Cek apakah jenis pesanan dipilih
            if (!hotRadio.checked && !iceRadio.checked) {
              hasError = true;
              const warningMessage = document.querySelector(`#${category}-content .warning-message`);
              warningMessage.innerText = `Silakan pilih jenis minuman.`;
              warningMessage.style.display = "block"; // Menampilkan pesan peringatan
            } else {
              type = hotRadio.checked ? "Hot" : "Ice"; // Menentukan jenis pesanan

              // Ambil harga berdasarkan jenis yang dipilih
              if (hotRadio.checked) {
                itemPrice = parseFloat(item.cells[1].innerText.split("Rp ")[1].replace(".", "")); // Ambil harga Hot
              } else if (iceRadio.checked) {
                itemPrice = parseFloat(item.cells[1].innerText.split("Rp ")[2].replace(".", "")); // Ambil harga Ice
              }

              // Cek jika harga adalah 0
              if (itemPrice === 0) {
                hasError = true;
                const warningMessage = document.querySelector(`#${category}-content .warning-message`);
                warningMessage.innerText = `Menu tidak tersedia.`;
                warningMessage.style.display = "block"; // Menampilkan pesan peringatan
                return; // Keluar dari fungsi jika menu tidak tersedia
              }

              const itemTotal = itemPrice * quantity; // Hitung total berdasarkan harga yang dipilih
              totalPrice += itemTotal; // Tambahkan ke total harga

              // Menambahkan informasi ke ringkasan pesanan dengan jenis pesanan
              orderSummary.innerHTML += `
                <p style="font-size: smaller;">${menuName} ${type ? `(${type})` : ""} <span style="font-weight: bold; color: #8E00A3; font-size: 11px;"> QTY : ${quantity}</span> ‎ : Rp ${itemTotal}</p>
              `;

              const warningMessage = document.querySelector(`#${category}-content .warning-message`);
              warningMessage.style.display = "none"; // Menyembunyikan pesan peringatan
            }
          } else {
            // Untuk kategori lain, ambil harga langsung dari sel
            const price = parseFloat(item.cells[1].innerText.replace("Rp ", "").replace(".", ""));
            const itemTotal = price * quantity;
            totalPrice += itemTotal; // Hitung total harga untuk kategori lain

            // Menambahkan informasi ke ringkasan pesanan dengan jenis pesanan
            orderSummary.innerHTML += `
              <p style="font-size: smaller;">${menuName} ${type ? `(${type})` : ""} <span style="font-weight: bold; color: #8E00A3; font-size: 11px;"> QTY : ${quantity}</span> ‎ : Rp ${itemTotal}</p>
            `;
          }
        }
      });
    });

    if (hasError) {
      return; // Jika ada error, tidak lanjut ke proses pemesanan
    }

    // Tampilkan total harga
    totalPriceElement.innerHTML = `<strong>Total harga: Rp ${totalPrice}</strong>`;

    // Tampilkan pop-up
    document.getElementById("popup").style.display = "flex";
  });
});

// Menangani tombol tutup pop-up
document.getElementById("close-popup").addEventListener("click", () => {
  document.getElementById("popup").style.display = "none";
});

// Menangani tombol konfirmasi
document.getElementById("confirm-button").addEventListener("click", () => {
  const checkboxes = document.querySelectorAll('input[name="orderType"]:checked');
  let orderTypes = [];
  checkboxes.forEach((checkbox) => {
    orderTypes.push(checkbox.value);
  });

  // Cek jenis pesanan dan arahkan ke halaman yang sesuai
  if (orderTypes.includes("cafe")) {
    // Mengambil informasi dari ringkasan pesanan
    const orderSummary = document.getElementById("order-summary").innerText;
    const totalPrice = document.getElementById("total-price").innerText;

    // Simpan informasi ke localStorage
    localStorage.setItem('orderSummary', orderSummary);
    localStorage.setItem('totalPrice', totalPrice);
    window.location.href = "pembayaran_cafe.php"; // Arahkan ke halaman pembayaran_cafe.php
  } else if (orderTypes.includes("kurir")) {
    window.location.href = "pembayaran_kurir.php"; // Arahkan ke halaman pembayaran_kurir.php
  } else {
    alert('Silakan pilih jenis pesanan.'); // Pesan jika tidak ada pilihan
  }
});

// Menangani tombol batal
document.getElementById("cancel-button").addEventListener("click", () => {
  document.getElementById("popup").style.display = "none"; // Tutup pop-up
});

document.getElementById('confirm-button').addEventListener('click', function () {
  const checkboxes = document.querySelectorAll('input[name="orderType"]:checked');
  let orderTypes = [];
  checkboxes.forEach((checkbox) => {
    orderTypes.push(checkbox.value);
  });

  // Tampilkan pilihan jenis pesanan
  alert('Jenis Pesanan Anda: ' + orderTypes.join(', '));
  // Tutup pop-up setelah konfirmasi
  document.getElementById('popup').style.display = 'none';
});