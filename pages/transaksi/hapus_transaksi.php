<?php
include "koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id'");

if ($query) {
    echo "<script>alert('Transaksi Telah Dihapus'); window.location='dashboard.php?page=transaksi.php';</script>";
}
?>