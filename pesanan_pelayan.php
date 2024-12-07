<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NF Cafe - Pesanan Pelayan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        .order-list {
            margin: 20px 0;
            padding: 10px;
         
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .order-details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
        }

        .arrow-icon {
            cursor: pointer;
            margin-left: auto;
            background-color: #A300BD;
            /* Tambahkan latar belakang */
            border-radius: 50%;
            /* Membuat sudut membulat */
            width: 45px;
            /* Mengatur lebar latar belakang */
            height: 45px;
            /* Mengatur tinggi latar belakang */
            display: flex;
            /* Menggunakan flexbox */
            justify-content: center;
            /* Memusatkan konten secara horizontal */
            align-items: center;
            /* Memusatkan konten secara vertikal */
            font-size: 26px;
            /* Ukuran font untuk memperbesar ikon */
            transition: background-color 0.3s, transform 0.2s;
            /* Transisi untuk efek interaktif */
        }

        .arrow-icon:hover {
            background-color: #90009E;
            /* Warna lebih gelap saat hover */
            transform: scale(1.1);
            /* Efek membesar saat hover */
        }

        .arrow-icon:hover {
            background-color: #90009E;
            /* Warna lebih gelap saat hover */
            transform: scale(1.1);
            /* Efek membesar saat hover */
        }

        .delete-icon {
            cursor: pointer;
            margin-left: 10px;
            margin-top: 4px;
            background-color: #A300BD;
            /* Tambahkan latar belakang */
            border-radius: 50%;
            /* Membuat sudut membulat */
            padding: 10px;
            /* Memberikan padding untuk ruang di sekitar ikon */
            transition: background-color 0.3s, transform 0.2s;
            /* Transisi untuk efek interaktif */
        }

        .delete-icon:hover {
            background-color: #90009E;
            /* Warna lebih gelap saat hover */
            transform: scale(1.1);
            /* Efek membesar saat hover */
        }

        .order-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0px;
            background-color: #b0b4b5;
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            flex-grow: 1;
            margin-right: 20px;
            height: 35px;
            /* Set the height */
        }

        .detail-button {
            background-color: #A300BD;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .detail-button:hover {
            background-color: #90009E;
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
        </div>
        <div class="main-content">
            <div class="header">
                <h2>PESANAN COSTUMER (PELAYAN)</h2>
            </div>
            <div id="order-list">
                <!-- Daftar pesanan akan diisi oleh JavaScript -->
            </div>
        </div>
    </div>
    <script>
        // Ambil readyOrders dari local storage
        const readyOrders = JSON.parse(localStorage.getItem('readyOrders')) || [];
        const orderList = document.getElementById('order-list');

        if (readyOrders.length > 0) {
            readyOrders.forEach((order, index) => {
                // Validasi untuk memastikan order tidak null dan memiliki properti yang diperlukan
                if (order && order.customer_name && order.table_number && order.order_summary) {
                    orderList.innerHTML += `
                <div class="order-list">
                    <div class="order-container">
                        <div>
                            <strong>${order.customer_name}</strong> (Meja: ${order.table_number})
                        </div>
                        <span class="arrow-icon" onclick="toggleDetails(${index})">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                    </div>
                    <div class="delete-icon-container">
                        <img src="gambar/hapus.jpeg" alt="Hapus" class="delete-icon" onclick="hapusPesanan(${index})" style="width: 25px; height: 25px;">
                    </div>
                </div>
                <div class="order-details" id="details-${index}">
                    <p>Pesanan: ${order.order_summary}</p>
                    <button class="detail-button" onclick="pesananTelahDiantar(${index})">Pesanan telah diantar</button>
                </div>
            `;
                } else {
                    console.error("Order tidak valid:", order); // Log untuk memeriksa order yang tidak valid
                }
            });
        } else {
            orderList.innerHTML = '<p>Belum ada pesanan yang telah diantar.</p>';
        }

        function toggleDetails(index) {
            const details = document.getElementById(`details-${index}`);
            details.style.display = details.style.display === 'none' || details.style.display === '' ? 'block' : 'none';
        }

        function pesananTelahDiantar(index) {
            const readyOrders = JSON.parse(localStorage.getItem('readyOrders')) || [];
            const orders = JSON.parse(localStorage.getItem('orders')) || [];

            // Pastikan bahwa order yang diambil tidak null
            if (readyOrders[index]) {
                const order = readyOrders[index];
                order.delivery_status = "Pesanan telah dikirim"; // Mengubah status pengantaran

                // Update status di readyOrders
                readyOrders[index] = order;
                localStorage.setItem('readyOrders', JSON.stringify(readyOrders)); // Simpan kembali ke localStorage

                // Cari dan update status di orders
                const orderIndex = orders.findIndex(o => o.customer_name === order.customer_name && o.table_number === order.table_number);
                if (orderIndex !== -1) {
                    orders[orderIndex].delivery_status = "Pesanan telah diantar"; // Update status pengantaran di orders
                    localStorage.setItem('orders', JSON.stringify(orders)); // Simpan kembali ke localStorage
                }

                // Menampilkan alert setelah status diubah
                alert(`Status pengantaran untuk ${order.customer_name} telah diubah menjadi "Pesanan telah dikirim".`);

                location.reload(); // Memuat ulang halaman untuk memperbarui tampilan
            } else {
                console.error("Pesanan tidak valid:", readyOrders[index]);
            }
        }

        function hapusPesanan(index) {
            const readyOrders = JSON.parse(localStorage.getItem('readyOrders')) || [];
            readyOrders.splice(index, 1); // Hapus pesanan dari array
            localStorage.setItem('readyOrders', JSON.stringify(readyOrders)); // Simpan kembali ke local storage
            location.reload(); // Memuat ulang halaman untuk memperbarui tampilan
        }
    </script>
</body>

</html>