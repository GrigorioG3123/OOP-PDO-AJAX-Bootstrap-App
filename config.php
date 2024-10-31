<?php
// Inisialisasi koneksi database
require_once 'classes/Database.php';

$database = new Database();
$db = $database->connect();
