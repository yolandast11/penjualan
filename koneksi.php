<?php
$host = "localhost";
$username = "root"; // Default XAMPP adalah root
$password = "";     // Default XAMPP adalah kosong
$dbname = "db_penjualan"; // SESUAIKAN dengan nama di phpMyAdmin nanti

// Gunakan cara penulisan simpel ini di baris 8:
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";
?>