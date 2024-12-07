<?php
session_start();
include 'db.php'; // Sertakan file koneksi database

// Menyimpan menu baru ke tabel tb_menu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $jenis_menu = $_POST['jenis_menu'];
    $harga_menu = $_POST['harga_menu'];

    $sql = "INSERT INTO tb_menu (nama_menu, jenis_menu, harga_menu) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $nama_menu, $jenis_menu, $harga_menu);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Menu berhasil ditambahkan."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan menu."]);
    }

    $stmt->close();
    $conn->close();
    exit();
}

// Mengambil semua menu dari tabel tb_menu
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM tb_menu";
    $result = $conn->query($sql);
    
    $menu = [];
    while ($row = $result->fetch_assoc()) {
        $menu[] = $row;
    }

    echo json_encode($menu);
    $conn->close();
    exit();
}
?>