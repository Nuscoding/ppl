<?php
session_start();
include 'db.php'; // Sertakan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']); // Ambil username dari input
    $password_input = trim($_POST['password']); // Ambil password dari input

    // Query untuk mengambil data pengguna dari tabel tb_dapur
    $sql = "SELECT * FROM tb_dapur WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password tanpa hashing
        if ($password_input === $row['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username']; // Pastikan kolom username ada di tabel tb_dapur
            header("Location: pesanan_dapur.php"); // Arahkan ke halaman pesanan dapur
            exit();
        } else {
            $_SESSION['login_error'] = "Username atau password salah!";
            header("Location: login_dapur.php"); // Kembali ke halaman login
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Username atau password salah!";
        header("Location: login_dapur.php"); // Kembali ke halaman login
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>