<html>

<head>
    <title>Informasi Pesanan Kurir</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/pembayaran.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-container">
                <img alt="NF Coffee Logo" src="gambar/logo_nf.jpeg" height="50" width="50" />
                <div class="logo-text">
                    <h1>NF COFFEE</h1>
                    <p>COFFEE AND RESTO</p>
                </div>
            </div>
            <ul class="menu-list">
                <!-- Menghapus item menu yang tidak diinginkan -->
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <h2>INFORMASI PESANAN KURIR</h2>
                <i class="fas fa-user-circle profile-icon"></i>
            </div>
            <div class="content">
                <div class="payment-method">
                    <h4>Pilih Metode Pembayaran</h4>
                    <div class="icons">
                        <label class="payment-option">
                            <input type="radio" name="payment-method" value="cash" checked>
                            <i class="fas fa-money-bill-wave"></i>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment-method" value="transfer">
                            <i class="fas fa-credit-card"></i>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" name="name" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input id="phone" name="phone" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input id="address" name="address" type="text" />
                    </div>
                    <button id="buat-pesanan-btn">BUAT PESANAN</button> <!-- Tombol tetap ada -->
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up -->
    <div id="popup" class="popup" style="display: none;">
        <div class="popup-content">
            <p id="popup-message"></p>
            <div class="button-container">
                <button id="cancel-button">Batal</button>
                <button id="ok-button">OK</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('buat-pesanan-btn').addEventListener('click', function () {
            const nameInput = document.getElementById('name');
            const phoneInput = document.getElementById('phone');
            const addressInput = document.getElementById('address');
            const popup = document.getElementById('popup');
            const popupMessage = document.getElementById('popup-message');

            // Validasi input
            let isValid = true;

            // Cek apakah nama kosong
            if (nameInput.value.trim() === '') {
                isValid = false;
            }

            // Cek apakah nomor telepon kosong
            if (phoneInput.value.trim() === '') {
                isValid = false;
            }

            // Cek apakah alamat kosong
            if (addressInput.value.trim() === '') {
                isValid = false;
            }

            // Dapatkan metode pembayaran yang dipilih
            const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;

            // Tampilkan pop-up jika semua validasi berhasil
            if (isValid) {
                if (paymentMethod === 'cash') {
                    popupMessage.textContent = `Pesanan berhasil dibuat untuk ${nameInput.value} di alamat ${addressInput.value}. Mohon untuk membayar kepada kurir saat pesanan tiba.`;
                } else if (paymentMethod === 'transfer') {
                    popupMessage.textContent = `Metode pembayaran transfer saat ini belum tersedia. Silakan bayar di kasir saat pesanan tiba.`;
                }
                popup.style.display = 'flex';
            } else {
                // Jika ada kesalahan, tampilkan pesan peringatan
                alert("Tolong periksa input Anda. Pastikan semua field terisi dengan benar.");
            }
        });

        // Menutup pop-up saat tombol OK ditekan
        document.getElementById('ok-button').addEventListener('click', function () {
            document.getElementById('popup').style.display = 'none';
        });

        // Menutup pop-up saat tombol Batal ditekan
        document.getElementById('cancel-button').addEventListener('click', function () {
            document.getElementById('popup').style.display = 'none';
        });
    </script>
</body>

</html>