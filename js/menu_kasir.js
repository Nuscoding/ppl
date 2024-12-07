// Mengambil elemen menu dan konten
const menuItems = document.querySelectorAll('.menu-item');
const menuContents = document.querySelectorAll('.menu-content');
const welcomeMessage = document.getElementById('welcome-message');

// Menambahkan event listener untuk setiap item menu
menuItems.forEach(item => {
    item.addEventListener('mouseover', () => {
        item.classList.add('hover');
    });
    item.addEventListener('mouseout', () => {
        item.classList.remove('hover');
    });
    item.addEventListener('click', () => {
        // Menghapus kelas 'active' dari semua menu item
        menuItems.forEach(i => i.classList.remove('active'));
        // Menambahkan kelas 'active' pada item yang diklik
        item.classList.add('active');

        // Menyembunyikan semua konten menu
        menuContents.forEach(content => content.style.display = 'none');

        // Menampilkan konten yang sesuai dengan id item yang diklik
        const id = item.id + '-content';
        document.getElementById(id).style.display = 'block';

        // Mengubah pesan selamat datang sesuai dengan menu yang dipilih
        if (welcomeMessage) {
            welcomeMessage.innerText = `Selamat Datang di Menu ${item.innerText}`;
        }

        // Mengubah judul header sesuai menu yang dipilih
        document.getElementById('menu-title').innerText = `MENU ${item.innerText.toUpperCase()} (KASIR)`;
    });
});

// Menyimpan kategori aktif
let kategoriAktif = 'minuman'; // Default ke minuman

// Fungsi untuk mengatur kategori aktif
function setKategoriAktif(kategori) {
    kategoriAktif = kategori;
}

// Fungsi untuk menampilkan form tambah menu sesuai kategori aktif
function tampilkanFormTambahAktif() {
    tutupForm(); // Menyembunyikan semua form yang terbuka
    if (kategoriAktif === 'minuman') {
        document.getElementById('form-tambah-menu-minuman').style.display = 'block';
        document.getElementById('form-tambah-menu-lain').style.display = 'none';
    } else {
        document.getElementById('form-tambah-menu-lain').style.display = 'block';
        document.getElementById('form-tambah-menu-minuman').style.display = 'none';
    }
    document.getElementById('popup-container').style.display = 'flex';
}

// Menyimpan kategori aktif untuk edit
let kategoriAktifEdit = 'minuman'; // Default ke minuman

// Fungsi untuk mengatur kategori aktif untuk edit
function setKategoriAktifEdit(kategoriEdit) {
    kategoriAktifEdit = kategoriEdit;
}

// Fungsi untuk menampilkan form edit menu sesuai kategori aktif
function tampilkanFormEdit(namaMenu, hargaHot, hargaIce, komposisi) {
    tutupForm(); // Menutup form lain yang sedang terbuka
    console.log(`Menampilkan form edit untuk: ${namaMenu}, Kategori Aktif: ${kategoriAktifEdit}`);

    // Simpan nama asli menu ke input tersembunyi
    document.getElementById('nama-menu-edit-asli').value = namaMenu;
    

    // Sesuaikan data input dengan kategori
    if (kategoriAktifEdit === 'minuman') {
        document.getElementById('nama-menu-edit').value = namaMenu;
        document.getElementById('harga-edit-hot').value = hargaHot;
        document.getElementById('harga-edit-ice').value = hargaIce;
        document.getElementById('komposisi-edit').value = komposisi; // Tambahkan ini untuk mengupdate komposisi
        document.getElementById('form-edit-menu-minuman').style.display = 'block';
        document.getElementById('form-edit-menu-lain').style.display = 'none';
    } else {
        document.getElementById('nama-menu-edit-lain').value = namaMenu;
        document.getElementById('komposisi-edit-lain').value = komposisi; // Tambahkan ini untuk mengupdate komposisi
        document.getElementById('harga-edit-lain').value = hargaHot; // Atur sesuai input harga
        document.getElementById('form-edit-menu-minuman').style.display = 'none';
        document.getElementById('form-edit-menu-lain').style.display = 'block';
    }

    // Tampilkan form popup
    document.getElementById('popup-container').style.display = 'flex';
}


// Menambahkan event listener untuk setiap item menu
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        // Set kategori aktif saat item diklik
        setKategoriAktif(item.id);
        
        // Menghapus kelas 'active' dari semua menu item
        menuItems.forEach(i => i.classList.remove('active'));
        // Menambahkan kelas 'active' pada item yang diklik
        item.classList.add('active');

        // Menyembunyikan semua konten menu
        menuContents.forEach(content => content.style.display = 'none');

        // Menampilkan konten yang sesuai dengan id item yang diklik
        const id = item.id + '-content';
        document.getElementById(id).style.display = 'block';

        // Mengubah pesan selamat datang sesuai dengan menu yang dipilih
        if (welcomeMessage) {
            welcomeMessage.innerText = `Selamat Datang di Menu ${item.innerText}`;
        }

        // Mengubah judul header sesuai menu yang dipilih
        document.getElementById('menu-title').innerText = `MENU ${item.innerText.toUpperCase()} (KASIR)`;
    });
});

// Menambahkan event listener untuk setiap item menu
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        // Set kategori aktif saat item diklik
        setKategoriAktif(item.id);
        setKategoriAktifEdit(item.id); // Set kategori aktif untuk edit juga

        // Menghapus kelas 'active' dari semua menu item
        menuItems.forEach(i => i.classList.remove('active'));
        // Menambahkan kelas 'active' pada item yang diklik
        item.classList.add('active');

        // Menyembunyikan semua konten menu
        menuContents.forEach(content => content.style.display = 'none');

        // Menampilkan konten yang sesuai dengan id item yang diklik
        const id = item.id + '-content';
        document.getElementById(id).style.display = 'block';

        // Mengubah pesan selamat datang sesuai dengan menu yang dipilih
        if (welcomeMessage) {
            welcomeMessage.innerText = `Selamat Datang di Menu ${item.innerText}`;
        }

        // Mengubah judul header sesuai menu yang dipilih
        document.getElementById('menu-title').innerText = `MENU ${item.innerText.toUpperCase()} (KASIR)`;
    });
});


// Fungsi untuk Menyimpan Perubahan Menu Minuman





let menuMinuman = [

];

let menuMakanan = [
   // { nama: 'Nasi Goreng', harga: 30000 }//
];
let menuSeafood = [
    //{ nama: 'Udang', harga: 500000 }//
];
let menuSharing = [
    //{ nama: 'Paket Sharing', harga: 150000 }//
];
let menuSnack = [
    //{ nama: 'Keripik Kentang', harga: 10000 }//
];


// Fungsi untuk Menambah Menu Minuman
function tambahMenuMinuman() {
    console.log("Fungsi tambahMenuMinuman dipanggil"); // Tambahkan ini untuk debugging 
    const namaMenu = document.getElementById('nama-menu-tambah-minuman').value.trim() || ""; // Nilai default kosong untuk teks
    const komposisi = document.getElementById('komposisi-tambah-minuman').value.trim() || ""; // Nilai default kosong untuk teks
    const hargaMenuHot = parseFloat(document.getElementById('harga-tambah-hot').value) || 0; // Nilai default 0 untuk angka
    const hargaMenuIce = parseFloat(document.getElementById('harga-tambah-ice').value) || 0; // Nilai default 0 untuk angka

    // Tambahkan menu baru ke array 
    menuMinuman.push({ 
        nama: namaMenu, 
        komposisi: komposisi, // Simpan komposisi 
        hargaHot: hargaMenuHot, 
        hargaIce: hargaMenuIce 
    });

    // Update tabel 
    updateTableMinuman(); 

    // Simpan menuMinuman ke localStorage 
    localStorage.setItem('menuMinuman', JSON.stringify(menuMinuman)); 

    console.log(`Menu Minuman ditambahkan: ${namaMenu}, Komposisi: ${komposisi}, Harga Hot: Rp ${hargaMenuHot}, Harga Ice: Rp ${hargaMenuIce}`); 

    // Tutup form setelah menambah menu 
    tutupForm(); 
}

function updateTableMinuman() {
    const tableBody = document.querySelector('#minuman-content tbody');
    tableBody.innerHTML = ''; // Kosongkan tabel sebelum diupdate

    menuMinuman.forEach(menu => {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td>
                ${menu.nama || ""}<br>
                <span style="font-size: 10px; font-style: italic; font-weight: bold; max-height: 80px; overflow: hidden; word-wrap: break-word; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 5;">
                    Komposisi: ${menu.komposisi || ""}
                </span>
            </td>
            <td>
                <div>
                    <span style="display: block;">${(menu.hargaHot !== undefined && menu.hargaHot !== null && menu.hargaHot !== 0) ? "Rp " + menu.hargaHot : "<span style='font-size: 12px; font-style: italic;'>Menu Tidak Tersedia</span>"}</span>
                    <span style="display: block;">${(menu.hargaIce !== undefined && menu.hargaIce !== null && menu.hargaIce !== 0) ? "Rp " + menu.hargaIce : "<span style='font-size: 12px; font-style: italic;'>Menu Tidak Tersedia</span>"}</span>
                </div>
            </td>
            <td>
                <input type="radio" name="${menu.nama.replace(/\s/g, "_")}" value="hot"> Hot<br>
                <input type="radio" name="${menu.nama.replace(/\s/g, "_")}" value="ice"> Ice
            </td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div class="icon-container" onclick="setKategoriAktifEdit('minuman'); tampilkanFormEdit('${menu.nama}', ${(menu.hargaHot !== undefined && menu.hargaHot !== null && menu.hargaHot !== 0) ? menu.hargaHot : "Menu Tidak Tersedia"}, ${(menu.hargaIce !== undefined && menu.hargaIce !== null && menu.hargaIce !== 0) ? menu.hargaIce : "Menu Tidak Tersedia"}, '${menu.komposisi || ""}')">
                        <img src="gambar/edit.png" alt="Edit" class="icon-edit">
                    </div>
                    <div class="icon-container" style="margin-left: 8px;" onclick="hapusMenu('${menu.nama}')">
                        <img src="gambar/hapus.jpeg" alt="Hapus" class="icon-hapus">
                    </div>
                </div>
            </td>
        `;
    });
}

// Fungsi untuk menambah menu ke kategori yang sesuai
function tambahMenuLain() {
    const namaMenu = document.getElementById('nama-menu-tambah-lain').value;
    const komposisi = document.getElementById('komposisi-tambah-lain').value; // Ambil nilai komposisi
    const hargaMenu = document.getElementById('harga-tambah-lain').value;

    // Menambahkan menu baru ke kategori yang sesuai
    if (kategoriAktif === 'makanan') {
        menuMakanan.push({ nama: namaMenu, komposisi: komposisi, harga: hargaMenu });
        updateTableMakanan();
        localStorage.setItem('menuMakanan', JSON.stringify(menuMakanan)); // Simpan ke localStorage
    } else if (kategoriAktif === 'seafood') {
        menuSeafood.push({ nama: namaMenu, komposisi: komposisi, harga: hargaMenu });
        updateTableSeafood();
        localStorage.setItem('menuSeafood', JSON.stringify(menuSeafood)); // Simpan ke localStorage
    } else if (kategoriAktif === 'sharing-menu') {
        menuSharing.push({ nama: namaMenu, komposisi: komposisi, harga: hargaMenu });
        updateTableSharing();
        localStorage.setItem('menuSharing', JSON.stringify(menuSharing)); // Simpan ke localStorage
    } else if (kategoriAktif === 'snack') {
        menuSnack.push({ nama: namaMenu, komposisi: komposisi, harga: hargaMenu });
        updateTableSnack();
        localStorage.setItem('menuSnack', JSON.stringify(menuSnack)); // Simpan ke localStorage
    }

    console.log(`Menu ditambahkan: ${namaMenu}, Komposisi: ${komposisi}, Harga: ${hargaMenu}`);

    // Tutup form setelah menambah menu
    tutupForm();
}

function simpanPerubahanMinuman() { 
    const namaMenuEdit = document.getElementById('nama-menu-edit').value.trim() || ""; // Nilai default kosong untuk teks
    const komposisiEdit = document.getElementById('komposisi-edit').value.trim() || ""; // Nilai default kosong untuk teks
    const hargaEditHot = parseFloat(document.getElementById('harga-edit-hot').value) || 0; // Nilai default 0 untuk angka
    const hargaEditIce = parseFloat(document.getElementById('harga-edit-ice').value) || 0; // Nilai default 0 untuk angka
    const namaMenuAsli = document.getElementById('nama-menu-edit-asli').value; // Nama asli menu yang diedit 

    // Cari index menu yang akan diedit 
    const index = menuMinuman.findIndex(menu => menu.nama === namaMenuAsli); 
    if (index !== -1) { 
        // Update menu yang ada 
        menuMinuman[index] = { 
            nama: namaMenuEdit, 
            komposisi: komposisiEdit, 
            hargaHot: hargaEditHot, 
            hargaIce: hargaEditIce 
        }; 

        // Simpan kembali ke localStorage 
        localStorage.setItem('menuMinuman', JSON.stringify(menuMinuman)); 

        // Update tabel 
        updateTableMinuman(); 

        console.log(`Menu Minuman diupdate: ${namaMenuEdit}, Harga Hot: Rp ${hargaEditHot}, Harga Ice: Rp ${hargaEditIce}`); 

        // Tutup form setelah menyimpan perubahan 
        tutupForm(); 
    } else { 
        alert("Menu tidak ditemukan."); 
    } 
}

function simpanPerubahanLain() {
    console.log("Fungsi simpanPerubahanLain dipanggil");

    // Ambil data dari input form
    const namaMenuAsli = document.getElementById('nama-menu-edit-asli').value; // Nama asli menu
    const namaMenuBaru = document.getElementById('nama-menu-edit-lain').value; // Nama baru menu
    const hargaMenu = document.getElementById('harga-edit-lain').value;        // Harga baru menu
    const komposisiBaru = document.getElementById('komposisi-edit-lain').value; // Komposisi baru

    console.log(`Nama Menu Asli: ${namaMenuAsli}, Nama Baru: ${namaMenuBaru}, Harga: ${hargaMenu}`);

    // Update array sesuai kategori
    if (kategoriAktifEdit === 'makanan') {
        const index = menuMakanan.findIndex(menu => menu.nama === namaMenuAsli);
        if (index !== -1) {
            menuMakanan[index].nama = namaMenuBaru; // Update nama
            menuMakanan[index].harga = hargaMenu;  // Update harga
            menuMakanan[index].komposisi = komposisiBaru;  // Update komposisi
            console.log('menuMakanan setelah update:', menuMakanan);
            updateTableMakanan(); // Update tabel makanan
            localStorage.setItem('menuMakanan', JSON.stringify(menuMakanan)); // Simpan ke localStorage
        } else {
            console.error(`Menu ${namaMenuAsli} tidak ditemukan di menuMakanan`);
        }
    } else if (kategoriAktifEdit === 'seafood') {
        const index = menuSeafood.findIndex(menu => menu.nama === namaMenuAsli);
        if (index !== -1) {
            menuSeafood[index].nama = namaMenuBaru; // Update nama
            menuSeafood[index].harga = hargaMenu;  // Update harga
            menuSeafood[index].komposisi = komposisiBaru;  // Update komposisi
            console.log('menuSeafood setelah update:', menuSeafood);
            updateTableSeafood(); // Update tabel seafood
            localStorage.setItem('menuSeafood', JSON.stringify(menuSeafood)); // Simpan ke localStorage
        } else {
            console.error(`Menu ${namaMenuAsli} tidak ditemukan di menuSeafood`);
        }
    } else if (kategoriAktifEdit === 'sharing-menu') {
        const index = menuSharing.findIndex(menu => menu.nama === namaMenuAsli);
        if (index !== -1) {
            menuSharing[index].nama = namaMenuBaru; // Update nama
            menuSharing[index].harga = hargaMenu;  // Update harga
            menuSharing[index].komposisi = komposisiBaru;  // Update komposisi
            console.log('menuSharing setelah update:', menuSharing);
            updateTableSharing(); // Update tabel sharing menu
            localStorage.setItem('menuSharing', JSON.stringify(menuSharing)); // Simpan ke localStorage
        } else {
            console.error(`Menu ${namaMenuAsli} tidak ditemukan di menuSharing`);
        }
    } else if (kategoriAktifEdit === 'snack') {
        const index = menuSnack.findIndex(menu => menu.nama === namaMenuAsli);
        if (index !== -1) {
            menuSnack[index].nama = namaMenuBaru; // Update nama
            menuSnack[index].harga = hargaMenu;  // Update harga
            menuSnack[index].komposisi = komposisiBaru;  // Update komposisi
            console.log('menuSnack setelah update:', menuSnack);
            updateTableSnack(); // Update tabel snack
            localStorage.setItem('menuSnack', JSON.stringify(menuSnack)); // Simpan ke localStorage
        } else {
            console.error(`Menu ${namaMenuAsli} tidak ditemukan di menuSnack`);
        }
    }

    // Tutup form setelah menyimpan perubahan
    tutupForm();
}

function updateTableMakanan() {
    const tableBody = document.querySelector('#makanan-content tbody');
    tableBody.innerHTML = ''; // Kosongkan tabel sebelum diupdate

    menuMakanan.forEach(menu => {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td>${menu.nama}<br>
                <span style="font-size: 10px; font-style: italic; font-weight: bold;">Komposisi: ${menu.komposisi}</span>
            </td>
            <td>Rp ${menu.harga}</td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div class="icon-container" onclick="setKategoriAktifEdit('makanan'); tampilkanFormEdit('${menu.nama}', '${menu.harga}', '${menu.komposisi}')">
                        <img src="gambar/edit.png" alt="Edit" class="icon-edit">
                    </div>
                    <div class="icon-container" style="margin-left: 8px;" onclick="hapusMenu('${menu.nama}')">
                        <img src="gambar/hapus.jpeg" alt="Hapus" class="icon-hapus">
                    </div>
                </div>
            </td>
        `;
    });
}


function updateTableSeafood() {
    const tableBody = document.querySelector('#seafood-content tbody');
    tableBody.innerHTML = ''; // Kosongkan tabel sebelum diupdate

    menuSeafood.forEach(menu => {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td>${menu.nama}<br>
                <span style="font-size: 10px; font-style: italic; font-weight: bold;">Komposisi: ${menu.komposisi}</span>
            </td>
            <td>Rp ${menu.harga}</td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div class="icon-container" 
                         onclick="setKategoriAktifEdit('seafood'); tampilkanFormEdit('${menu.nama}', ${menu.harga}, ${menu.harga})"> <!-- Menambahkan pemanggilan setKategoriAktifEdit -->
                        <img src="gambar/edit.png" alt="Edit" class="icon-edit">
                    </div>
                    <div class="icon-container" style="margin-left: 8px;" onclick="hapusMenu('${menu.nama}')">
                        <img src="gambar/hapus.jpeg" alt="Hapus" class="icon-hapus">
                    </div>
                </div>
            </td>
        `;
    });
}

function updateTableSharing() {
    const tableBody = document.querySelector('#sharing-menu-content tbody');
    console.log("Table Body:", tableBody); // Tambahkan ini untuk debugging
    if (!tableBody) {
        console.error("Table Body untuk kategori sharing menu tidak ditemukan!");
        return;
    }
    tableBody.innerHTML = ''; // Kosongkan tabel sebelum diupdate

    menuSharing.forEach(menu => {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td>${menu.nama}<br>
                <span style="font-size: 10px; font-style: italic; font-weight: bold;">Komposisi: ${menu.komposisi}</span>
            </td>
            <td>Rp ${menu.harga}</td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div class="icon-container" 
                         onclick="setKategoriAktifEdit('sharing-menu'); tampilkanFormEdit('${menu.nama}', ${menu.harga}, ${menu.harga})">
                        <img src="gambar/edit.png" alt="Edit" class="icon-edit">
                    </div>
                    <div class="icon-container" style="margin-left: 8px;" onclick="hapusMenu('${menu.nama}')">
                        <img src="gambar/hapus.jpeg" alt="Hapus" class="icon-hapus">
                    </div>
                </div>
            </td>
        `;
    });
}
function updateTableSnack() {
    const tableBody = document.querySelector('#snack-content tbody');
    tableBody.innerHTML = ''; // Kosongkan tabel sebelum diupdate

    menuSnack.forEach(menu => {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td>${menu.nama}<br>
                <span style="font-size: 10px; font-style: italic; font-weight: bold;">Komposisi: ${menu.komposisi}</span>
            </td>
            <td>Rp ${menu.harga}</td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div class="icon-container" 
                         onclick="setKategoriAktifEdit('snack'); tampilkanFormEdit('${menu.nama}', ${menu.harga}, ${menu.harga})"> <!-- Menambahkan pemanggilan setKategoriAktifEdit -->
                        <img src="gambar/edit.png" alt="Edit" class="icon-edit">
                    </div>
                    <div class="icon-container" style="margin-left: 8px;" onclick="hapusMenu('${menu.nama}')">
                        <img src="gambar/hapus.jpeg" alt="Hapus" class="icon-hapus">
                    </div>
                </div>
            </td>
        `;
    });
}

// Fungsi untuk Menghapus Menu
function hapusMenu(namaMenu) {
    // Hapus menu dari array berdasarkan kategori aktif
    if (kategoriAktif === 'minuman') {
        menuMinuman = menuMinuman.filter(menu => menu.nama !== namaMenu);
        localStorage.setItem('menuMinuman', JSON.stringify(menuMinuman)); // Simpan perubahan ke localStorage
        updateTableMinuman(); // Perbarui tabel minuman
    } else if (kategoriAktif === 'makanan') {
        menuMakanan = menuMakanan.filter(menu => menu.nama !== namaMenu);
        localStorage.setItem('menuMakanan', JSON.stringify(menuMakanan)); // Simpan perubahan ke localStorage
        updateTableMakanan(); // Perbarui tabel makanan
    } else if (kategoriAktif === 'seafood') {
        menuSeafood = menuSeafood.filter(menu => menu.nama !== namaMenu);
        localStorage.setItem('menuSeafood', JSON.stringify(menuSeafood)); // Simpan perubahan ke localStorage
        updateTableSeafood(); // Perbarui tabel seafood
    } else if (kategoriAktif === 'sharing-menu') {
        menuSharing = menuSharing.filter(menu => menu.nama !== namaMenu);
        localStorage.setItem('menuSharing', JSON.stringify(menuSharing)); // Simpan perubahan ke localStorage
        updateTableSharing(); // Perbarui tabel sharing menu
    } else if (kategoriAktif === 'snack') {
        menuSnack = menuSnack.filter(menu => menu.nama !== namaMenu);
        localStorage.setItem('menuSnack', JSON.stringify(menuSnack)); // Simpan perubahan ke localStorage
        updateTableSnack(); // Perbarui tabel snack
    }

    console.log(`Menu dihapus: ${namaMenu}`);
}

// Event listener untuk tombol hapus
const btnHapus = document.querySelectorAll('.btn-hapus');
btnHapus.forEach(btn => {
    btn.addEventListener('click', () => {
        const namaMenu = btn.getAttribute('data-nama-menu');
        hapusMenu(namaMenu);
    });
});

// Pastikan DOM sudah sepenuhnya dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Ambil kategori aktif dari localStorage
    const kategoriTerakhir = localStorage.getItem('kategoriAktif');
    if (kategoriTerakhir) {
        setKategoriAktif(kategoriTerakhir); // Set kategori aktif
        menuItems.forEach(item => {
            if (item.id === kategoriTerakhir) {
                item.click(); // Simulasikan klik pada item menu untuk menampilkan konten yang sesuai
            }
        });
    }

    const storedMenuMinuman = localStorage.getItem('menuMinuman');
if (storedMenuMinuman) {
    menuMinuman = JSON.parse(storedMenuMinuman);
    updateTableMinuman(); // Perbarui tabel minuman
}


    // Memulihkan menu dari localStorage untuk kategori makanan
    const storedMenuMakanan = localStorage.getItem('menuMakanan');
    if (storedMenuMakanan) {
        menuMakanan = JSON.parse(storedMenuMakanan);
        updateTableMakanan(); // Perbarui tabel makanan
    }

    // Memulihkan menu dari localStorage untuk kategori seafood
    const storedMenuSeafood = localStorage.getItem('menuSeafood');
    if (storedMenuSeafood) {
        menuSeafood = JSON.parse(storedMenuSeafood);
        updateTableSeafood(); // Perbarui tabel seafood
    }

    // Memulihkan menu dari localStorage untuk kategori sharing-menu
    const storedMenuSharing = localStorage.getItem('menuSharing');
    if (storedMenuSharing) {
        menuSharing = JSON.parse(storedMenuSharing);
        updateTableSharing(); // Perbarui tabel sharing menu
    }

    // Memulihkan menu dari localStorage untuk kategori snack
    const storedMenuSnack = localStorage.getItem('menuSnack');
    if (storedMenuSnack) {
        menuSnack = JSON.parse(storedMenuSnack);
        updateTableSnack(); // Perbarui tabel snack
    }

    // Event listener untuk tombol simpan perubahan minuman
    const btnSimpanMinuman = document.querySelector('.btn-simpan-perubahan');
    if (btnSimpanMinuman) {
        btnSimpanMinuman.addEventListener('click', function() {
            simpanPerubahanMinuman();
        });
    }

    // Event listener untuk tombol simpan perubahan lain
    const btnSimpanLain = document.querySelector('.btn-simpan-perubahan-lain');
    if (btnSimpanLain) {
        btnSimpanLain.addEventListener('click', function() {
            simpanPerubahanLain();
        });
    }

    
    
});

// Menutup Form
function tutupForm() {
    document.getElementById('popup-container').style.display = 'none';
    document.getElementById('form-tambah-menu-minuman').style.display = 'none';
    document.getElementById('form-tambah-menu-lain').style.display = 'none';
    document.getElementById('form-edit-menu-minuman').style.display = 'none';
    document.getElementById('form-edit-menu-lain').style.display = 'none';
}

function setKategoriAktif(kategori) {
    kategoriAktif = kategori;
    localStorage.setItem('kategoriAktif', kategori); // Simpan kategori aktif ke localStorage
}

document.addEventListener('DOMContentLoaded', function() {
    // Ambil kategori aktif dari localStorage
    const kategoriTerakhir = localStorage.getItem('kategoriAktif');
    if (kategoriTerakhir) {
        setKategoriAktif(kategoriTerakhir); // Set kategori aktif
        menuItems.forEach(item => {
            if (item.id === kategoriTerakhir) {
                item.click(); // Simulasikan klik pada item menu untuk menampilkan konten yang sesuai
            }
        });
    }
});