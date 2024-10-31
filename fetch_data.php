<?php
require_once 'config.php';

$query = "SELECT * FROM users"; // Query untuk mengambil data
$stmt = $db->prepare($query);
$stmt->execute();

$data = "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data .= "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>
                    <button class='btn btn-warning btn-sm editUser' data-id='{$row['id']}'>Edit</button>
                    <button class='btn btn-danger btn-sm deleteUser' data-id='{$row['id']}'>Hapus</button>
                </td>
              </tr>";
}

$data .= "</tbody></table>";

echo $data;
?>


