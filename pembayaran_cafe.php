<!DOCTYPE html>
<html lang="en">

<head>
    <title>Informasi Pesanan Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/pembayaran.css">
</head>
<style>
    .form-group .error-message {
        color: red;
        font-size: 0.6em;
        margin-top: 0.5em;
        text-align: left;
        font-style: italic;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .form-group .error-message i {
        margin-right: 5px;
        font-size: 0.6em;
    }

    .popup {
        display: none;
        /* Sembunyikan pop-up secara default */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Latar belakang semi-transparan */
        justify-content: center;
        align-items: center;
        z-index: 1000;
        /* Pastikan pop-up di atas elemen lain */
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }
</style>

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
        </div>
        <div class="main-content">
            <div class="header">
                <h2>INFORMASI PESANAN CAFE</h2>
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
                        <span class="error-message" id="name-error" style="display: none; color: red;">
                            <i class="fas fa-exclamation-triangle"></i> Nama tidak boleh kosong.
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="table-number">Nomor Meja</label>
                        <input id="table-number" name="table-number" type="number" min="1" max="50" required />
                        <span class="error-message" id="table-error" style="display: none; color: red;">
                            <i class="fas fa-exclamation-triangle"></i> Nomor meja harus antara 1 dan 50.
                        </span>
                    </div>
                    <button id="buat-pesanan-btn">BUAT PESANAN</button>
                </div>

                <!-- Pop-up -->
                <div id="popup" class="popup" style="display: none;">
                    <div class="popup-content">
                        <p id="popup-message"></p>
                        <div class="button-container">
                            <button id="cancel-button">Batal</button>
                            <button id="ok-button">OK</button>
                            <button id="back-to-menu-button" style="display: none;">Kembali ke Menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('table-number').addEventListener('input', function() {

            const value = this.value;
            const errorMessage = document.getElementById('table-error');

            if (value < 1 || value > 50) {
                errorMessage.style.display = 'flex';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    </script>

    <script>
        // Event listener untuk tombol "BUAT PESANAN"
        document.getElementById('buat-pesanan-btn').addEventListener('click', function() {
            const nameInput = document.getElementById('name');
            const tableNumber = document.getElementById('table-number').value;
            const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;

            // Validasi nama
            if (!nameInput.value) {
                document.getElementById('name-error').style.display = 'flex';
                return;
            } else {
                document.getElementById('name-error').style.display = 'none';
            }

            // Validasi nomor meja
            if (tableNumber < 1 || tableNumber > 50) {
                document.getElementById('table-error').style.display = 'flex';
                return;
            } else {
                document.getElementById('table-error').style.display = 'none';
            }

            // Menampilkan pop-up konfirmasi jika metode pembayaran adalah tunai
            let popupMessage = document.getElementById('popup-message');
            let popup = document.getElementById('popup');

            if (paymentMethod === 'cash') {
                popupMessage.textContent = `Pesanan berhasil dibuat untuk "${nameInput.value}" di meja "${tableNumber}". Silahkan melakukan pembayaran di kasir.`;
                popup.style.display = 'flex'; // Menampilkan pop-up
            } else if (paymentMethod === 'transfer') {
                popupMessage.textContent = `Metode pembayaran saat ini belum tersedia.`;
                popup.style.display = 'flex'; // Menampilkan pop-up
            }
        });

        // Event listener untuk tombol "OK" di pop-up
        document.getElementById('ok-button').addEventListener('click', function() {
            const nameInput = document.getElementById('name');
            const tableNumber = document.getElementById('table-number').value;
            const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;

            // Ambil informasi dari localStorage
            const orderSummary = localStorage.getItem('orderSummary');
            const totalPrice = localStorage.getItem('totalPrice');

            // Membuat objek data pesanan
            const orderData = {
                customer_name: nameInput.value,
                table_number: tableNumber,
                payment_method: paymentMethod,
                delivery_status: 'Belum dikirim',
                order_summary: orderSummary, // Menyimpan ringkasan pesanan
                total_price: totalPrice // Menyimpan total harga
            };

            // Mengambil data pesanan yang sudah ada dari Local Storage
            let orders = JSON.parse(localStorage.getItem('orders')) || []; // Inisialisasi dengan array kosong jika tidak ada

            // Menambahkan pesanan baru ke dalam array
            orders.push(orderData);

            // Menyimpan kembali ke Local Storage
            localStorage.setItem('orders', JSON.stringify(orders));

            // Menampilkan pesan umpan balik
            document.getElementById('popup-message').textContent = "Terima kasih! Pesanan Anda telah diproses.";

            // Menyembunyikan tombol OK dan Batal
            document.getElementById('ok-button').style.display = 'none';
            document.getElementById('cancel-button').style.display = 'none';

            // Menampilkan tombol "Kembali ke Menu"
            document.getElementById('back-to-menu-button').style.display = 'block'; // Menampilkan tombol "Kembali ke Menu"
        });
    </script>
    <script>
        // Event listener untuk tombol "Batal" di pop-up
        document.getElementById('cancel-button').addEventListener('click', function() {
            const popup = document.getElementById('popup');
            popup.style.display = 'none'; // Menyembunyikan pop-up
        });
        document.getElementById('back-to-menu-button').addEventListener('click', function() {
            window.location.href = 'menu_pelanggan.php'; // Mengarahkan ke menu pelanggan
        });
    </script>
</body>

</html>