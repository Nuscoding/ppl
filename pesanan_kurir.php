<html>

<head>
    <title>Informasi Pelanggan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<style>

</style>

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
            
        </div>
        <div class="main-content">
            <div class="header">
                <h2>PESANAN COSTUMER (KASIR)</h2>
                <!--<i class="fas fa-user-circle profile-icon"></i>-->
            </div>
            <div class="form-container"> <!-- Ganti kelas container menjadi form-container -->
                <h1>INFORMASI COSTUMER (KURIR)</h1>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="nomor-telpon">Nomor Telpon</label>
                    <input type="text" id="nomor-telpon" name="nomor-telpon">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                    <label for="pesanan">Pesanan</label>
                    <textarea id="pesanan" name="pesanan"></textarea>
                </div>
                <div class="form-group-total">
                    <div class="total-harga-container">
                        <label for="total-harga">Total Harga</label>
                        <input type="text" id="total-harga" name="total-harga">
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
</body>

</html>