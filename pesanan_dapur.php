<html>

<head>
    <title>NF Cafe - Pesanan Dapur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        .order-list {
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            position: relative;
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

        .delete-icon {
            cursor: pointer;
            margin-left: 10px;
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
            /* Menggunakan flexbox */
            align-items: center;
            /* Memastikan semua item sejajar secara vertikal */
            justify-content: space-between;
            /* Memberikan jarak yang merata antara item */
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

        .order-list .delete-icon-container {
            margin-left: 10px;
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
                <h2>PESANAN COSTUMER (DAPUR)</h2>
            </div>
            <div id="order-list">
                <!-- Daftar pesanan akan ditampilkan di sini -->
            </div>
        </div>
    </div>
    <script>
        // Ambil existingOrders dari local storage
        const existingOrders = JSON.parse(localStorage.getItem('existingOrders')) || [];
        const orderList = document.getElementById('order-list');

        if (existingOrders.length > 0) {
            existingOrders.forEach((order, index) => {
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
                        <button class="detail-button" onclick="pesananSiapDiantar(${index})">Pesanan Siap Diantar</button>
                    </div>
                `;
            });
        } else {
            orderList.innerHTML = '<p>Belum ada pesanan.</p>';
        }

        function toggleDetails(index) {
            const details = document.getElementById(`details-${index}`);
            details.style.display = (details.style.display === 'none' || details.style.display === '') ? 'block' : 'none';
        }

        function pesananSiapDiantar(index) {
            const existingOrders = JSON.parse(localStorage.getItem('existingOrders')) || [];
            const readyOrders = JSON.parse(localStorage.getItem('readyOrders')) || [];

            // Ambil pesanan yang siap diantar
            const readyOrder = existingOrders[index];

            // Pastikan bahwa readyOrder tidak null sebelum menambahkannya ke readyOrders
            if (readyOrder && readyOrder.customer_name && readyOrder.table_number && readyOrder.order_summary) {
                readyOrders.push(readyOrder);
                localStorage.setItem('readyOrders', JSON.stringify(readyOrders));
                alert(`Pesanan untuk ${readyOrder.customer_name} siap diantar!`);
                location.reload(); // Memuat ulang halaman untuk memperbarui tampilan
            } else {
                console.error("Pesanan tidak valid:", readyOrder);
            }
        }

        function hapusPesanan(index) {
            let existingOrders = JSON.parse(localStorage.getItem('existingOrders')) || [];

            // Menghapus pesanan berdasarkan indeks
            existingOrders.splice(index, 1);

            // Menyimpan kembali ke local storage
            localStorage.setItem('existingOrders', JSON.stringify(existingOrders));

            // Memuat ulang halaman untuk memperbarui tampilan
            location.reload();
        }
    </script>
</body>

</html>