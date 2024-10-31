<?php
require_once 'config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query untuk menghapus data pengguna
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Pengguna berhasil dihapus!";
    } else {
        echo "Terjadi kesalahan, coba lagi.";
    }
}
?>
