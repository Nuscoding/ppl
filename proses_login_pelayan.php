<?php
session_start();
include 'db.php'; // Sertakan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password_input = trim($_POST['password']);

    // Query untuk mengambil data pengguna dari database
    $sql = "SELECT * FROM tb_pelayan WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password tanpa hashing
        if ($password_input === $row['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: pesanan_pelayan.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Username atau password salah!";
            header("Location: login_pelayan.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Username atau password salah!";
        header("Location: login_pelayan.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>