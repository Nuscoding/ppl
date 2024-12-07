<!DOCTYPE html>
<html lang="en">

<head>
    <title>NF Cafe - Pesanan Kasir</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css"> <!-- Link ke CSS khusus untuk admin -->
    <style>
        .order-list {
            display: none;
            display: flex;
            /* Sembunyikan daftar pesanan secara default */
            align-items: center;
            /* Memastikan bahwa mereka sejajar secara vertikal */
            justify-content: space-between;
            /* Center the order list */
            margin-top: 40px;

        }

        .order-list.visible {
            display: block;
            /* Tampilkan daftar pesanan jika ada */
        }

        .order-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Menyusun item dengan jarak antara */
            margin-bottom: 0px;
            background-color: #b0b4b5;
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            /* Garis batas untuk kontainer */
            flex-grow: 1;
            /* Memungkinkan container customer untuk mengisi ruang yang tersisa */
            margin-right: 20px;
            /* Memberikan jarak 10px antara container dan ikon ceklis */
            height: 35px;
            /* Set the height */
        }



        .customer-name {
            flex: 1;
            /* Membuat nama pelanggan mengambil ruang yang tersedia */
            flex-grow: 1;
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            color: black;
            margin-left: 5px;
        }

        .check-icon-container {
            display: flex;
            /* Memastikan ikon ceklis terpusat */
            align-items: center;
            /* Memastikan ikon ceklis sejajar secara vertikal */
            margin-top: 0px;
        }



        .check-icon {
            background-color: #A300BD;
            width: 50px;
            height: 50px;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20%;
            border: 2px solid #888;
            /* Menambahkan border */
            transition: background-color 0.3s, transform 0.2s;
            /* Transisi untuk efek interaktif */
        }

        .check-icon:hover {
            background-color: #90009E;
            /* Mengubah warna latar saat kursor berada di atas */
            cursor: pointer;
            /* Mengubah kursor menjadi pointer saat hover */
        }

        .check-icon:active {
            transform: scale(0.95);
            /* Efek mengecil saat diklik */
        }

        .detail-button {
            background-color: #A300BD;
            /* Warna ungu */

            /* Teks putih */
            font-weight: bold;
            /* Teks tebal */
            border: none;
            /* Tanpa border */
            border-radius: 5px;
            /* Sudut membulat */
            padding: 5px 10px;
            /* Padding di dalam tombol */
            cursor: pointer;
            /* Kursor pointer saat hover */
            transition: background-color 0.3s;
            /* Transisi warna latar belakang */
        }

        .detail-button:hover {
            background-color: #90009E;
            /* Warna lebih gelap saat hover */
        }

        .status-kirim {
            color: #28a745;
            /* Mengubah warna teks menjadi hijau cerah */
            font-weight: bold;
            /* Menebalkan teks jika diinginkan */
        }
    </style>
</head>

<body>
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
            <button class="btn-kelola-menu" onclick="window.location.href='menu_kasir.php'">Kelola Menu</button>
        </div>
        <div class="main-content">
            <div class="header">
                <h2>PESANAN COSTUMER (KASIR)</h2>
                <!--<i class="fas fa-user-circle profile-icon"></i> -->
            </div>
            <div id="order-list" class="order-list">
                <!-- Daftar pesanan akan diisi oleh JavaScript -->
            </div>
        </div>
    </div>
    <script>
        // Mengambil data pesanan dari local storage
        const orders = JSON.parse(localStorage.getItem('orders')) || []; // Ambil array pesanan atau inisialisasi dengan array kosong

        const orderList = document.getElementById('order-list');

        if (orders.length > 0) {
            orders.forEach((order, index) => {
                // Memeriksa status pengantaran dan memformat teks
                let deliveryStatusText = order.delivery_status;
                if (deliveryStatusText === "Pesanan telah diantar") {
                    deliveryStatusText = `<span class="status-kirim">${deliveryStatusText}</span>`; // Membungkus dengan span untuk mengubah warna
                }

                orderList.innerHTML += `
    <div class="order-list">
        <div class="order-container">
            <div class="customer-name">
                ${order.customer_name} (Meja: ${order.table_number}, Status pengantaran: ${deliveryStatusText})
            </div>
            <button class="detail-button" onclick="showDetail(${index})">Detail Pesanan</button>
        </div>
        <div class="check-icon-container">
            <div class="check-icon" onclick="hapusPesanan(${index})">
                <img src="gambar/hapus.jpeg" alt="Hapus" style="width: 35px; height: 35px; cursor: pointer;">
            </div>
        </div>
    </div>
    `;

            });
            orderList.classList.add('visible'); // Menampilkan daftar pesanan
        } else {
            orderList.innerHTML = `
            <div? class="order-list">
    <div class="order-container">
        <div class="customer-name">
            Belum ada pesanan.
        </div>
    </div>
    </div?
`;
        }

        // Fungsi untuk menghapus pesanan
        function hapusPesanan(index) {
            // Mengambil data pesanan yang ada
            let orders = JSON.parse(localStorage.getItem('orders')) || [];

            // Menghapus pesanan dari array
            orders.splice(index, 1);

            // Menyimpan kembali ke Local Storage
            localStorage.setItem('orders', JSON.stringify(orders));

            // Memperbarui tampilan
            location.reload(); // Memuat ulang halaman untuk memperbarui tampilan
        }
    </script>
    <script>
        // Fungsi untuk menampilkan detail pesanan
        function showDetail(index) {
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const order = orders[index];

            if (!order) {
                console.error("No order found at index:", index);
                return;
            }

            // Mengarahkan ke halaman pesanan_cafe.php dengan parameter
            window.location.href = `pesanan_cafe.php?customer_name=${encodeURIComponent(order.customer_name)}&table_number=${order.table_number}&payment_method=${encodeURIComponent(order.payment_method)}&delivery_status=${encodeURIComponent(order.delivery_status)}&order_summary=${encodeURIComponent(order.order_summary)}&total_price=${encodeURIComponent(order.total_price)}`;
        }
    </script>
</body>

</html>