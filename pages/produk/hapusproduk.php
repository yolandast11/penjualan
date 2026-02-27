<?php
include "koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Perintah hapus berdasarkan kode_barang
$query = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang = '$id'");

if ($query) {
    echo "<script>alert('Data Berhasil Dihapus'); window.location='dashboard.php?page=product.php';</script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>