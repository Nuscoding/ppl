<html>

<head>
    <title>
        Menu Kasir
    </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        }

        .btn-pesan:hover {
            background-color: #8E00A3;
            /* Warna lebih gelap saat hover */
        }

        /* CSS untuk pemisah modern */
        .separator {
            height: 2px;
            background-color: #ccc;
            /* Warna pemisah */
            margin: 10px 0;
            /* Jarak atas dan bawah */
            width: 100%;
            /* Lebar penuh */
        }

        /* CSS untuk ikon keranjang */
        #keranjang-icon {
            position: absolute;
            /* Posisi absolut */
            top: 10px;
            /* Jarak dari atas */
            right: 10px;
            /* Jarak dari kanan */
            width: 40px;
            /* Lebar ikon */
            height: 40px;
            /* Tinggi ikon */
        }

        .btn-tambah-menu-1 {
            position: fixed;
            /* Tetap di tempat saat menggulir */
            top: 70px;
            /* Jarak dari bawah */
            left: 280px;
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
            width: 15%;
            z-index: 100;
        }

        .btn-tambah-menu-1:hover {
            background-color: #8E00A3;
            /* Warna lebih gelap saat hover */
        }

        .icon-container {
            background-color: #b0b4b5;
            /* Warna latar belakang */
            padding: 5px;
            /* Padding untuk memberikan jarak antara gambar dan latar */
            border-radius: 4px;
            /* Sudut melengkung */
            display: inline-block;
            /* Agar elemen berada di dalam satu baris */
        }

        /* Pop-up Container */
        #popup-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            /* Make sure it's on top */
        }

        /* Pop-up Content */
        #popup-content {
            background-color: #fff;
            /* White background for the pop-up */
            padding: 20px;
            /* Add padding */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            /* Shadow effect */
            width: 90%;
            /* Responsive width */
            max-width: 400px;
            /* Maximum width */
            max-height: 80vh;
            /* Maximum height */
            overflow-y: auto;
            /* Scroll if content exceeds max height */
            position: relative;
            /* For positioning close button */
        }

        /* Close Button */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            font-weight: bold;
            color: #000;
            /* Black color */
            cursor: pointer;
            z-index: 1001;
            /* Ensure it's above other elements */
            transition: color 0.3s;
        }

        .close-button:hover {
            color: #e74c3c;
            /* Change color on hover */
        }

        /* Form Elements */
        label {
            display: block;
            /* Make labels block elements */
            margin-top: 10px;
            /* Space above labels */
            font-weight: bold;
            /* Bold text for labels */
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            /* Full width */
            padding: 10px;
            /* Padding inside inputs */
            margin-top: 5px;
            /* Space above inputs */
            border: 1px solid #ccc;
            /* Light gray border */
            border-radius: 4px;
            /* Rounded corners */
            box-sizing: border-box;
            /* Include padding and border in width */
        }

        .btn-tambah-menu,
        .btn-simpan-perubahan,
        .btn-tutup {
            background-color: #A300BD;
            /* Purple background */
            color: white;
            /* White text */
            border: none;
            /* No border */
            padding: 10px;
            /* Padding */
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor */
            margin-top: 10px;
            /* Space above buttons */
            width: 100%;
            /* Full width */
            transition: background-color 0.3s;
            /* Transition for hover effect */
        }

        .btn-tambah-menu:hover,
        .btn-simpan-perubahan:hover,
        .btn-tutup:hover {
            background-color: #8E00A3;
            /* Darker purple on hover */
        }
    </style>
</head>
<!-- Pop-up Container -->

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
            <div class="separator"></div> <!-- Elemen separator -->
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
            <input type="text" id="search-menu" class="search-box" placeholder="Cari menu...">
                <h2 id="menu-title">MENU MINUMAN (KASIR)</h2>
                <i class="fas fa-user-circle profile-icon"></i>
            </div>

            <!-- Ikon keranjang di atas menu 
            <div style="position: relative;">
                <a href="keranjang.php">
                    <img id="keranjang-icon" src="gambar/keranjang.jpeg" alt="Keranjang">
                </a>
            </div> -->

            <!-- Tombol untuk Menambah Menu -->
            <button class="btn-tambah-menu-1" onclick="tampilkanFormTambahAktif()">Tambah Menu</button>

            <div class="separator"></div> <!-- Elemen separator -->

            <div id="minuman-content" class="menu-content" style="display: block;">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                        <!-- Tambahkan baris menu lainnya di sini -->
                    </tbody>
                </table>
            </div>

            <div id="makanan-content" class="menu-content" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>

                        <!-- Tambahkan baris menu makanan lainnya di sini -->
                    </tbody>
                </table>
            </div>

            <div id="seafood-content" class="menu-content" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>

                        <!-- Tambahkan baris menu seafood lainnya di sini -->
                    </tbody>
                </table>
            </div>
            <div id="sharing-menu-content" class="menu-content" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>


                        </tr>

                        <!-- Tambahkan baris menu sharing lainnya di sini -->
                    </tbody>
                </table>
            </div>
            <div id="snack-content" class="menu-content" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Tambahkan baris menu snack lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Pop-up Container untuk Form -->
    <div id="popup-container" style="display: none;">
        <div id="popup-content">

            <div id="form-tambah-menu-minuman" style="display: none;">
                <h3>Tambah Menu</h3>
                <label>Nama Menu:</label>
                <input type="text" id="nama-menu-tambah-minuman" required>
                <label>Komposisi:</label>
                <input type="text" id="komposisi-tambah-minuman" required> <!-- Tambahkan input ini -->
                <label>Harga Hot:</label>
                <input type="number" id="harga-tambah-hot" required>
                <label>Harga Ice:</label>
                <input type="number" id="harga-tambah-ice" required>
                <button class="btn-tambah-menu" onclick="tambahMenuMinuman()">Tambah Menu</button>
                <button class="btn-tutup" onclick="tutupForm()">Batal</button>
            </div>

            <div id="form-tambah-menu-lain" style="display: none;">
                <h3>Tambah Menu</h3>
                <label>Nama Menu:</label>
                <input type="text" id="nama-menu-tambah-lain" required>
                <label>Komposisi:</label>
                <input type="text" id="komposisi-tambah-lain" required> <!-- Tambahkan input ini -->
                <label>Harga:</label>
                <input type="number" id="harga-tambah-lain" required>
                <button class="btn-tambah-menu" onclick="tambahMenuLain()">Tambah Menu</button>
                <button class="btn-tutup" onclick="tutupForm()">Batal</button>
            </div>

            <!-- Form Edit Menu Lain -->
            <div id="form-edit-menu-minuman" style="display: none;">
                <h3>Edit Menu</h3>
                <label>Edit Nama Menu:</label>
                <input type="text" id="nama-menu-edit" required>
                <label>Edit Komposisi:</label>
                <input type="text" id="komposisi-edit" required> <!-- Tambahkan input ini -->
                <label>Edit Harga Hot:</label>
                <input type="number" id="harga-edit-hot" required>
                <label>Edit Harga Ice:</label>
                <input type="number" id="harga-edit-ice" required>
                <button class="btn-simpan-perubahan" onclick="simpanPerubahanMinuman()">Simpan Perubahan</button>
                <button class="btn-tutup" onclick="tutupForm()">Batal</button>
            </div>

            <div id="form-edit-menu-lain" style="display: none;">
                <input type="hidden" id="nama-menu-edit-asli" />
                <h3>Edit Menu</h3>
                <label>Edit Nama Menu:</label>
                <input type="text" id="nama-menu-edit-lain" required>
                <label>Edit Komposisi:</label>
                <input type="text" id="komposisi-edit-lain" required> <!-- Tambahkan input ini -->
                <label>Edit Harga:</label>
                <input type="number" id="harga-edit-lain" required>
                <button class="btn-simpan-perubahan" onclick="simpanPerubahanLain()">Simpan Perubahan</button>
                <button class="btn-tutup" onclick="tutupForm()">Batal</button>
            </div>


        </div>
    </div>
</body>
<script src="js/menu_kasir.js"></script>
<script>
    $( function() {
  function log( message ) {
    $( "<div>" ).text( message ).prependTo( "#log" );
  }

  $( "#search-menu" ).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: "search.php",
        dataType: "jsonp",
        data: {
          q: request.term
        },
        success: function( data ) {
          response( data );
        }
      });
    },
    minLength: 2,
    select: function( event, ui ) {
      log( "Selected: " + ui.item.value + " aka " + ui.item.id );
    }
  });
} );
</script>

</html>