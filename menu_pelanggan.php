<html>

<head>
    <title>
        Menu pelanggan
    </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <style>
        /* CSS tambahan untuk menghilangkan garis tabel */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        /* Gaya untuk tombol pesan */
        .btn-pesan {
            position: fixed;
            /* Tetap di tempat saat menggulir */
            top: 50px;
            /* Jarak dari bawah */
            right: 20px;
            /* Jarak dari kanan */
            background-color: #A300BD;
            /* Warna ungu solid */
            color: white;
            /* Warna teks putih */
            border: none;
            /* Menghilangkan border */
            padding: 8px 12px;
            /* Padding untuk tombol */
            border-radius: 4px;
            /* Sudut melengkung */
            cursor: pointer;
            /* Kursor pointer saat hover */
            transition: background-color 0.3s;
            /* Transisi saat hover */
            z-index: 100;
            /* Pastikan tombol berada di depan */
        }

        .warning-message {
            position: fixed;
            top: 60px;
            /* Jarak dari bawah */
            right: 100px;
            color: red;
            /* Warna teks */
            display: none;
            /* Tersembunyi secara default */
            margin-right: 10px;
            /* Jarak kanan */
            font-style: italic;
            /* Gaya italic */
            font-size: 15px;
            z-index: 100;
            border-top: 1px solid transparent;
            /* Border transparan untuk mencegah collapse */
            margin-top: 10px;
            /* Margin atas yang diinginkan */
        }




        .btn-pesan:hover {
            background-color: #8E00A3;
            /* Warna lebih gelap saat hover */
        }

        /* CSS untuk pemisah modern */
        .separator {
            height: 2px;
            /* Tinggi separator */
            background-color: #ccc;
            /* Warna pemisah */
            margin: 10px 0;
            /* Jarak atas dan bawah */
            width: 100%;
            /* Lebar penuh */
        }

        .input-jumlah {
            width: 40px;
            /* Lebar input yang lebih kecil */
            padding: 5px;
            /* Padding di dalam input yang lebih kecil */
            border: 2px solid #A300BD;
            /* Border input */
            border-radius: 4px;
            /* Sudut melengkung */
            outline: none;
            /* Menghilangkan outline default */
            transition: border-color 0.3s ease;
            /* Transisi untuk perubahan warna border */
            box-sizing: border-box;
            /* Menghitung padding dan border dalam lebar total */
            text-align: center;
            /* Teks di tengah */
            font-size: 14px;
            /* Ukuran font yang lebih kecil */
        }

        .input-jumlah:focus {
            border-color: #A300BD;
            /* Warna border saat fokus */
            box-shadow: 0 0 5px rgba(163, 0, 189, 0.5);
            /* Efek bayangan saat fokus */
        }

        .input-jumlah::-webkit-inner-spin-button,
        /* Menghilangkan spin button di Chrome */
        .input-jumlah::-webkit-outer-spin-button {
            -webkit-appearance: none;
            /* Menghilangkan tampilan default */
            margin: 0;
            /* Menghilangkan margin */
        }

        .custom-checkbox {
            width: 20px;
            /* Lebar checkbox */
            height: 20px;
            /* Tinggi checkbox */
            cursor: pointer;
            /* Menunjukkan bahwa ini bisa diklik */
            position: relative;
            /* Agar dapat menggunakan pseudo-element */
            appearance: none;
            /* Menghilangkan tampilan default */
            border: 2px solid #A300BD;
            /* Border kotak */
            border-radius: 4px;
            /* Sudut melengkung */
            outline: none;
            /* Menghilangkan outline default */
            margin: 0;
            /* Menghilangkan margin default */
            display: inline-block;
            /* Mengatur posisi inline */
        }

        .custom-checkbox:checked {
            background-color: #A300BD;
            /* Warna saat dicentang */
            border: 2px solid #A300BD;
            /* Border saat dicentang */
        }

        .custom-checkbox:checked::after {
            content: '';
            /* Menambahkan konten kosong */
            position: absolute;
            /* Mengatur posisi absolut */
            top: 2px;
            /* Jarak dari atas */
            left: 2px;
            /* Jarak dari kiri */
            width: 14px;
            /* Lebar centang */
            height: 14px;
            /* Tinggi centang */
            background-color: #6495ED;
            /* Warna latar belakang centang */
            border-radius: 2px;
            /* Sudut melengkung untuk centang */
        }

        .checkbox-container {
            display: flex;
            /* Menggunakan flexbox */
            align-items: center;
            /* Rata tengah secara vertikal */
            justify-content: center;
            /* Rata tengah secara horizontal */
        }

        .input-container {
            display: flex;
            align-items: center;
            /* Vertically center the items */
            justify-content: left;
            /* Horizontally center the items */
        }

        .input-jumlah {
            width: 50px;
            /* Atur lebar sesuai kebutuhan */
            text-align: center;
            /* Rata tengah teks di dalam input */
            border: 1px solid #ccc;
            /* Border abu-abu terang */
            border-radius: 4px;
            /* Sudut melengkung */
            margin: 0 10px;
            /* Jarak antara ikon dan input */
        }

        .icon-minus,
        .icon-plus {
            width: 20px;
            /* Atur lebar ikon */
            height: 20px;
            /* Atur tinggi ikon */
            cursor: pointer;
            /* Tunjukkan bahwa ikon bisa diklik */
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            /* Lebar pop-up yang lebih besar */
        }

        button {
            background-color: #8E00A3;
            /* Warna tombol */
            color: white;
            /* Warna teks putih */
            border: none;
            /* Menghilangkan border */
            padding: 10px 15px;
            /* Padding untuk tombol */
            border-radius: 4px;
            /* Sudut melengkung */
            cursor: pointer;
            /* Kursor pointer saat hover */
            transition: background-color 0.3s;
            /* Transisi saat hover */
            margin: 5px;
            /* Margin untuk tombol */
            margin-top: 24px;
        }

        button:hover {
            background-color: #A300BD;
            /* Warna lebih gelap saat hover */
        }

        .button-container {
            display: flex;
            /* Menggunakan flexbox */
            justify-content: space-between;
            /* Rata kiri kanan */
        }

        .close-button {
            cursor: pointer;
            float: right;
            font-size: 20px;
        }

        .order-type {
            display: flex;
            /* Menggunakan flexbox untuk mengatur elemen dalam satu baris */
            align-items: center;
            /* Menjaga agar elemen berada di tengah secara vertikal */
        }

        .order-type label {
            margin-right: 20px;
            /* Memberikan jarak antar label */
        }

        
    </style>
</head>
<!-- Pop-up Container -->
<div id="popup" class="popup" style="display: none;">
    <div class="popup-content">
        <span class="close-button" id="close-popup">&times;</span>
        <h2>Informasi Pesanan</h2>
        <div id="order-summary"></div>
        <div class="total-price" id="total-price"></div>

        <!-- Tambahkan pilihan jenis pesanan -->
        <h3 class="order-title">Jenis Pesanan</h3>
        <div class="order-type">
            <label>
                <input type="radio" name="orderType" value="cafe"> Cafe
            </label>
            <label>
                <input type="radio" name="orderType" value="kurir"> Kurir
            </label>
        </div>

        <div class="button-container">
            <button id="cancel-button">Batal</button>
            <button id="confirm-button">Konfirmasi</button>
        </div>
    </div>
</div>

<body>
    <div class="container" id="main-container">
        <div class="sidebar">
            <div class="logo-container">
                <img alt="NF Coffee Logo" height="50" src="gambar/logo_nf.jpeg" width="50" />
                <div class="logo-text">
                    <h1>
                        NF COFFEE
                    </h1>
                    <p>
                        COFFEE AND RESTO
                    </p>
                </div>
            </div>

            <ul class="menu-list">
                <li class="menu-item" id="minuman">MINUMAN</li>
                <li class="menu-item" id="makanan">MAKANAN</li>
                <li class="menu-item" id="seafood">SEAFOOD</li>
                <li class="menu-item" id="sharing-menu">SHARING MENU</li>
                <li class="menu-item" id="snack">SNACK</li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <input type="text" class="search-box" placeholder="Cari menu...">
                <h2 id="menu-title">MINUMAN</h2>
                <i class="fas fa-user-circle profile-icon"></i>
            </div>

            <div id="minuman-content" class="menu-content" style="display: block;">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <span class="warning-message"></span> <!-- Elemen pesan peringatan -->
                    <button class="btn-pesan">Pesan</button>
                </div>
                <div class="separator"></div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Jenis</th>
                            <th>Pilih Menu</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tambahkan baris menu lainnya di sini -->
                    </tbody>
                </table>
            </div>

            <div id="makanan-content" class="menu-content" style="display: none;">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <span class="warning-message"></span> <!-- Elemen pesan peringatan -->
                    <button class="btn-pesan">Pesan</button>
                </div>
                <div class="separator"></div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Pilih Menu</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Tambahkan baris menu makanan lainnya di sini -->
                    </tbody>
                </table>
            </div>

            <div id="seafood-content" class="menu-content" style="display: none;">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <span class="warning-message"></span> <!-- Elemen pesan peringatan -->
                    <button class="btn-pesan">Pesan</button>
                </div>
                <div class="separator"></div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Pilih Menu</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Tambahkan baris menu seafood lainnya di sini -->
                    </tbody>
                </table>
            </div>
            <div id="sharing-menu-content" class="menu-content" style="display: none;">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <span class="warning-message"></span> <!-- Elemen pesan peringatan -->
                    <button class="btn-pesan">Pesan</button>
                </div>
                <div class="separator"></div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Pilih Menu</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Tambahkan baris menu sharing lainnya di sini -->
                    </tbody>
                </table>
            </div>
            <div id="snack-content" class="menu-content" style="display: none;">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <span class="warning-message"></span> <!-- Elemen pesan peringatan -->
                    <button class="btn-pesan">Pesan</button>
                </div>
                <div class="separator"></div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Pilih Menu</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Tambahkan baris menu snack lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="js/menu.js"></script>


</html>