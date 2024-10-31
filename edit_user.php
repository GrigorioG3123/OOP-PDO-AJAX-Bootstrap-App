<?php
require_once 'config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Jika ID tersedia, ambil data pengguna
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($user);
}

if (isset($_POST['name']) && isset($_POST['age'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Query untuk memperbarui data
    $query = "UPDATE users SET name = :name, age = :age WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Data pengguna berhasil diperbarui!";
    } else {
        echo "Terjadi kesalahan, coba lagi.";
    }
}
?>
