<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari POST
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Query SQL untuk menambah data
    $query = "INSERT INTO users (name, age) VALUES (:name, :age)";
    $stmt = $db->prepare($query);

    // Bind parameter untuk mencegah SQL Injection
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Pengguna berhasil ditambahkan!";
    } else {
        echo "Terjadi kesalahan, coba lagi.";
    }
}
?>
