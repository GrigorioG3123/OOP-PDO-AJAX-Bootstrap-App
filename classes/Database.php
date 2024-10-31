<?php
class Database {
    private $host = "localhost";
    private $db_name = "oop_pdo_project"; // Nama database yang telah dibuat
    private $username = "root"; // Ganti sesuai dengan username database Anda
    private $password = ""; // Ganti sesuai dengan password database Anda
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
