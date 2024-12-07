<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NF Coffee</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
        }

        .header {
            background-color: #fff;
            display: flex;
            align-items: center;
            /* Logo, teks, dan tombol login sejajar secara vertikal */
            justify-content: space-between;
            /* Logo dan teks di kiri, tombol login di kanan */
            padding: 10px 20px;
            border-top: 10px solid #000;
            flex-wrap: nowrap;
            /* Mencegah elemen melipat ke baris berikutnya */
        }

        .header .left {
            display: flex;
            align-items: center;
            /* Teks sejajar secara vertikal dengan logo */
        }

        .header img {
            max-height: 80px;
            width: auto;
            margin-right: 20px;
            /* Jarak antara logo dan teks */
        }

        .header .text {
            display: flex;
            flex-direction: column;
            /* Teks disusun vertikal */
            color: #000;
            /* Warna teks */
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
            color: #000;
        }

        .header p {
            margin: 0;
            font-size: 18px;
            color: #000;
        }

        .header .buttons {
            display: flex;
            gap: 10px;
            /* Jarak antar tombol */
        }

        .header .buttons a {
            background-color: #000;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            white-space: nowrap;
            /* Mencegah teks di dalam tombol terpotong */
        }



        .main-content {
            background-image: url('gambar/background.jpeg');
            background-size: cover;
            /* Pastikan gambar memenuhi layar secara proporsional */
            background-repeat: no-repeat;
            /* Hindari pengulangan gambar */
            background-position: center;
            /* Fokuskan gambar di tengah */
            min-height: calc(80vh - 80px);
            /* Sesuaikan tinggi minimum */
            padding: 20px;
            /* Tambahkan padding untuk memberi ruang pada konten */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            align-items: flex-start;
            /* Elemen akan diatur ke kiri */
            text-align: left;
            /* Teks rata kiri */
            padding: 20px 40px;
            /* Berikan padding tambahan untuk jarak dari tepi layar */
        }

        .main-content h2,
        .main-content h3 {
            font-family: 'Playfair Display', serif;
            /* Ubah font ke Playfair Display */
            margin: 0 0 10px;

        }


        .main-content h2 {
            font-size: 30px;
            margin: 0;
        }

        .main-content h3 {
            font-size: 30px;
            margin: 5px;
            margin-left: 90px;

        }

        .main-content .button {
            background-color: #800080;
            color: #fff;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            align-self: flex-start;
            /* Posisikan tombol lebih ke kiri */
            font-family: 'Playfair Display', serif;
            /* Font tombol */
            margin-left: 100PX;
        }

        .login-buttons {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
        }

        .login-buttons a {
            background-color: #fff;
            color: #000;
            padding: 10px 20px;
            margin: 5px 0;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .footer {
            background-color: #607D8B;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }

        .footer .copyright {
            text-align: left;
            color: #fff;
        }

        .footer .social-icons {
            text-align: right;
        }

        .footer .social-icons a {
            color: #fff;
            margin: 0 5px;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="left">
            <img alt="NF Coffee Logo" src="gambar/logo_nf.jpeg" />
            <div class="text">
                <h1>NF COFFEE</h1>
                <p>COFFEE AND RESTO</p>
            </div>
        </div>
        <div class="buttons">
            <a href="login_kasir.php">LOGIN KASIR</a>
            <a href="login_pelayan.php">LOGIN PELAYAN</a>
            <a href="login_dapur.php">LOGIN DAPUR</a>
        </div>
    </header>



    <main class="main-content">
        <h2>COFFEE</h2>
        <h3>&amp; RESTO</h3>
        <a class="button" href="menu_pelanggan.php">MASUK</a>


    </main>

    <footer class="footer">
        <div class="copyright">
            <p>Copyright © 2024 NF Coffee dan Resto Majene</p>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

</body>

</html>