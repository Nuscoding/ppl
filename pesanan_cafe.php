<html>

<head>
    <title>Informasi Pelanggan </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<style>

</style>

<body>
    <?php
    // Mengambil data dari URL
    $customer_name = isset($_GET['customer_name']) ? $_GET['customer_name'] : '';
    $table_number = isset($_GET['table_number']) ? $_GET['table_number'] : '';
    $order_summary = isset($_GET['order_summary']) ? $_GET['order_summary'] : '';
    $total_price = isset($_GET['total_price']) ? $_GET['total_price'] : '';
    ?>
    <div class="container">
        <div class="sidebar">
            <div class="logo-container" style="display: flex; align-items: center;">
                <img alt="NF Coffee Logo" src="gambar/logo_nf.jpeg" height="50" width="50" />
                <div class="logo-text" style="margin-left: 10px;">
                    <h1>NF COFFEE</h1>
                    <p>COFFEE AND RESTO</p>
                </div>
            </div>
            <div class="separator"></div> <!-- Elemen separator -->
        </div>
        <div class="main-content">
            <div class="header">
                <h2>PESANAN COSTUMER (KASIR)</h2>
            </div>
            <div class="form-container"> <!-- Ganti kelas container menjadi form-container -->
                <h1>INFORMASI COSTUMER (CAFE)</h1>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($customer_name); ?>">
                </div>

                <div class="form-group">
                    <label for="alamat">Nomor Meja</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($table_number); ?>">
                </div>

                <div class="form-group">
                    <label for="pesanan">Pesanan</label>
                    <textarea id="pesanan" name="pesanan"><?php echo htmlspecialchars($order_summary); ?></textarea>
                </div>

                <div class="form-group-total">
                    <div class="total-harga-container">
                        <label for="total-harga">Total Harga</label>
                        <input type="text" id="total-harga" name="total-harga" value="<?php echo htmlspecialchars($total_price); ?>">
                    </div>
                    <div class="status-pembayaran-container">
                        <label for="status-pembayaran">Status Pembayaran</label>
                        <input type="text" id="status-pembayaran" name="status-pembayaran">
                    </div>
                </div>

                <div class="button-container">
                    <button type="button" class="btn-konfirmasi">KONFIRMASI</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk menghasilkan ID unik
        function generateUniqueId() {
            return 'order-' + Date.now(); // Menggunakan timestamp sebagai ID
        }
        document.querySelector('.btn-konfirmasi').addEventListener('click', function handler() {
            const customerName = document.getElementById('nama').value;
            const tableNumber = document.getElementById('alamat').value;
            const orderSummary = document.getElementById('pesanan').value;

            // Validasi input
            if (customerName && tableNumber && orderSummary) {
                const newOrder = {
                    id: generateUniqueId(), // Menambahkan ID unik
                    customer_name: customerName,
                    table_number: tableNumber,
                    order_summary: orderSummary,
                    total_price: document.getElementById('total-harga').value // Jika ada total harga
                };

                // Simpan ke local storage
                let existingOrders = JSON.parse(localStorage.getItem('existingOrders')) || []; // Array untuk menyimpan pesanan yang sudah ada

                // Cek apakah pesanan sudah ada berdasarkan customer_name dan table_number
                const existingOrder = existingOrders.find(order => order.customer_name === customerName && order.table_number === tableNumber);

                if (!existingOrder) {
                    existingOrders.push(newOrder); // Simpan pesanan baru ke existingOrders
                    localStorage.setItem('existingOrders', JSON.stringify(existingOrders));
                    alert('Pesanan berhasil disimpan!');
                } else {
                    alert('Pesanan dengan nama pelanggan dan nomor meja ini sudah ada, tetapi tetap disimpan dengan ID baru!');
                }
            } else {
                alert('Silakan lengkapi semua field!');
            }
            // Menghapus event listener setelah eksekusi
            document.querySelector('.btn-konfirmasi').removeEventListener('click', handler);
        });
    </script>
</body>

</html>